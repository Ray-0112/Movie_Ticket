document.addEventListener("DOMContentLoaded", function(event) { 
    var btn = document.querySelector('#btn');
    btn.addEventListener('click', function() {
      alert('click!');
    })
    
    var toggle = document.getElementById('toggle');
    var isVisible = true;
    toggle.addEventListener('click', function() {
      isVisible = !isVisible;
      var post = document.getElementsByClassName('post')[0];
      console.log(post);
      post.style.display = isVisible ? 'block' : 'none';
      toggle.innerHTML = isVisible ? 'hide' : 'show';
    })
  });