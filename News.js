function showNew() {
  let id_New = event.srcElement.id;
  var des = document.getElementById("openNew");

  let http = new XMLHttpRequest();
  let url = "db.php?state=";
  url = url + id_New;
  console.log(url);
  http.open("GET", url, true);
  http.send();
  http.onload = function () {
    if (this.readyState == 4 && this.status == 200) {
      let news = JSON.parse(this.responseText);
      let openednew = "";

      for (let selectednew of news) {
        openednew += `
  <div id="mainO">
  <img id="imgONEW" src="${selectednew.img}">

   <div id="phO1">
   <h1>${selectednew.title}</h1>
   <p>${selectednew.Des}</p>

  </div>`;
      }
      des.innerHTML = openednew;
    }
  };
}
