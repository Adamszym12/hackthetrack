function initMap() {
    let coordinates;
    $.get("/api/user/1", function (data, status) {
        coordinates = data;
    }).then(
        function () {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: coordinates.current_location ?? coordinates.locations[0].coordination,
            });
            $(coordinates.locations).each(function (index) {
                new google.maps.Marker({
                    position: this.coordination,
                    map,
                    title: this.name,
                });
            });

            if (coordinates.current_location) {
                new google.maps.Marker({
                    icon: "https://maps.google.com/mapfiles/kml/paddle/wht-stars.png",
                    position: coordinates.current_location,
                    map,
                    title: this.name,
                });
            }
        }
    );

}

