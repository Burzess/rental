function showAccessories(vehicleType) {
    var motorAccessories = document.getElementById('motorAccessories');
    var carAccessories = document.getElementById('carAccessories');

    motorAccessories.style.display = 'none';
    carAccessories.style.display = 'none';

    if (vehicleType === 'Motor') {
        motorAccessories.style.display = 'block';
    } else if (vehicleType === 'Mobil') {
        carAccessories.style.display = 'block';
    }
}
