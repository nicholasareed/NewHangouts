<script>
var supportsVibrate = "vibrate" in navigator;
navigator.vibrate(1000);
</script>

<script>
	var battery = navigator.battery || navigator.webkitBattery || navigator.mozBattery;

	// A few useful battery properties
	alert("Battery charging: ", battery.charging); // true
	alert("Battery level: ", battery.level); // 0.58
	alert("Battery discharging time: ", battery.dischargingTime);

// Add a few event listeners
	battery.addEventListener("chargingchange", function(e) {
  	alert("Battery charge change: ", battery.charging);
  }, false);
</script>