var default_camera = "5e5e2f12-3796-4af2-95f0-b2e232c07e72";
var roof_camera = "634a762f-8f5b-4719-afdc-82ce3bd51cd8";
var wall_camera = "74e93592-13d9-45d0-8083-8c300356584a";
var interior_camera = 'a94013e1-3284-41fd-849c-679cc080a535';

// fron translate camera:0.0892,13.19,13.5965
$(document).on("click", ".roof_camera", function () {
  alert("roof camera");
  var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
  clara.player.animateCameraTo(roof_camera, 300);
});

$(document).on("click", ".wall_camera", function () {
  alert("walls camera");
  var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
  clara.player.animateCameraTo(wall_camera, 300);

});

$(document).on("click", ".innercamera", function () {
  alert("inner camera");
  var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
  clara.player.animateCameraTo(interior_camera, 300);
});

$(document).on("click", ".outercamera", function () {
  alert("exterior camera");
  var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
  clara.player.animateCameraTo(default_camera, 300);

});