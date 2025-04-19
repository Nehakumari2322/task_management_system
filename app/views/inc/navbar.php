
<form action="<?php echo URLROOT; ?>taskmanagers/navform" method="post">

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#9ad87c;padding:0">
  <div class="container-fluid">
    <button class="navbar-brand" id="homebtn" name="homebtn" style="border:none;background:none;" href="#"><img src="<?php echo URLROOT.'/img/logoo.png';?>" height="60px" alt=""></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
        <button class="navbar-brand text-dark" id="homebtn" name="homebtn" style="border:none;background:none;" href="#">Home</button>
        </li>
       
        <li class="nav-item">
          <button class="nav-link active text-dark" aria-current="page" id="employeebtn" name="employeebtn" style="border:none;background:none;" type="submit" href="#">Employee</button>
        </li>
    
     
      </ul>
    </div>
  </div>
</nav>
</form>


