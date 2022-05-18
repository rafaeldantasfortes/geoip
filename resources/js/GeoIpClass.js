



class GeoIpClass {
    ip;
    constructor() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function (jqXHR, textStatus, errorThrown) {},
            beforeSend: function (xhr) {}
        });
        this.relogio();
    }
    relogio() {
        function relogioOk() {
            var object = this;
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }
                return i;
            }
            m = checkTime(m);
            s = checkTime(s);
            $(".relogio").html("<i class='fa fa-clock-o'></i>&nbsp;" + h + ":" + m + ":" + s);
            var t = setTimeout(relogioOk, 1000);
        }
        relogioOk();
    }

    getData() {
        $.ajax({
            type: "POST",
            url: "/getdata",
            data: {},
            dataType: "json",
            success: function (returndata) {
                $('#ip').html(returndata.ip);
                $('#timestamp').html(returndata.timestamp);
                $('#id').html(returndata.id);
                $('#latitude').html(returndata.latitude);
                $('#longitude').html(returndata.longitude);
                $('#country').html(returndata.country_name + "<img src='" + returndata.location.country_flag + "'>");
                $('#region').html(returndata.region_name);
                $('#city').html(returndata.city);
                $('#link').attr('href', "https://maps.google.com/maps?q=" + returndata.latitude + "," + returndata.longitude + "&hl=es;z=14&amp;output=embed");
                setTimeout(function () {
                    $('#overlay').addClass('d-none');
                    $('.table-responsive-lg').removeClass('d-none');
                    $('h3').removeClass('d-none');
                }, 3000);

            },
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
            }
        });
    }

    setIp(ip) {
        this.ip = ip;
        return this;
    }

}

