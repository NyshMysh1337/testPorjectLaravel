// sort
function sortListDir() {
    let list, i, switching, b, shouldSwitch, dir, switchcount = 0;
    list = document.getElementById("id01");
    switching = true;
    dir = "asc";
    while (switching) {
      switching = false;
      b = list.getElementsByTagName("tr");
      for (i = 0; i < (b.length - 1); i++) {
        shouldSwitch = false;
        if (dir == "asc") {
          if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (b[i].innerHTML.toLowerCase() < b[i + 1].innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
        switchcount ++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  // perPage

let per = document.getElementById('per');
// console.log(per.children[2]);


let url = new URLSearchParams(window.location.search)

if(!url.has('per_page')) {
    url.append('per_page', JSON.parse(localStorage.getItem('per_page')))
    window.location.search = url;
}
///

///
per.addEventListener('change', function () {
    let a = per.value;

    let index = per.selectedIndex
    console.log(index);
    let option = per.querySelectorAll('option')[index]
    option.setAttribute('selected', 'selected')

    localStorage.setItem('per_page', JSON.stringify(a))

    debugger
        this.setAttribute('selected', 'selected')
    console.log(JSON.parse(localStorage.getItem('per_page')))
        url.set('per_page', JSON.parse(localStorage.getItem('per_page')))
        window.location.search = url

})

