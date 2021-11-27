function initMap() {
    let coordinates;
    $.get("/api/user/1", function (data, status) {
        coordinates = data;
    }).then(
        function () {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: coordinates[0].coordination,
            });
            $(coordinates).each(function (index) {
                new google.maps.Marker({
                    icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                    position: this.coordination,
                    map,
                    title: this.name,
                });
            });

        }
    );

}

