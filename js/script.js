document.addEventListener("DOMContentLoaded", function() {
    const leftcar = document.getElementById("leftcar");
    const rightcar = document.getElementById("rightcar");
    const currentColorSelect = document.getElementById("currentcolor");
    const targetColorSelect = document.getElementById("targetcolor");

    // Function to change car color
    function changeCarColor(car, color) {
        switch (color) {
            case "default":
                car.src = `img/default-car.png`;
                break;
            case "blue":
                car.src = `img/blue-car.png`;
                break;
            case "red":
                car.src = `img/red-car.png`;
                break;
            case "green":
                car.src = `img/green-car.png`;
                break;
            default:
                break;
        }
    }

    // Event listener for immediate color change - leftcar
    currentColorSelect.addEventListener("change", function() {
        changeCarColor(leftcar, currentColorSelect.value);
    });

    // Event listener for immediate color change - rightcar
    targetColorSelect.addEventListener("change", function() {
        changeCarColor(rightcar, targetColorSelect.value);
    });
});

