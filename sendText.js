function text() {
  const phone = document.getElementById("phone").value;
  const msg = document.getElementById("message").value;

  var data = "";
  var xhr = new XMLHttpRequest();
  xhr.withCredentials = true;
  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      console.log(this.responseText);
    }
  });
  xhr.open(
    "POST",
    "http://66.45.237.70/api.php?username=" +
      username +
      "&password=" +
      password +
      "&number=" +
      phone +
      "&message=" +
      encodeURIComponent(msg)
  );
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
}
