<style>.row {
  margin-left:0;
  margin-right:0;
  max-width: 100%;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}
.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.photo:hover .image{
  opacity: 0.5;

}
.photo:hover .middle {
  opacity: 4;

}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 12px;
  padding: 16px 32px;
}
.best{
  background-color: #FFFAF0;
  width: 1260px;
}
</style><?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../config.php';
		include 'header-categories.php';
    include '../pricerange/range-smartphones.php';
?>
