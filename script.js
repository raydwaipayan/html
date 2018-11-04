document.addEventListener('DOMContentLoaded', function() {
    var elems = document.getElementById('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var dd = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(dd);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var prlx = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(prlx);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
   
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
	
  });

