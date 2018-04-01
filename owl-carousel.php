

<style>.row {
  margin-left:0;
  margin-right:0;
  max-width: 100%;
}
.image2 {
  opacity: 1;
  display: block;
  width: 100%;
  height: 300px;
  transition: .5s ease;
  backface-visibility: hidden;

}
.middle2 {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.photo2:hover .image2{
  opacity: 0.5;
  border: 5px solid #333300
;
}
.photo2:hover .middle2 {
  opacity: 3;
}

.text2 {
  background-color: #696969;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
    border: 1px double #384245
}
.owl {
padding-top: 10px;
}

</style>
<br>
<div class="container-fluid owl" >
  <div class="row">
    <div class="row">
        <div class="col"><center>
            <h2><b>PROMOTIONS</b></h2></center>
        </div>

    </div>
          <div id="carousel-example4" class="carousel slide hidden-xs" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              <div class="item active">
                  <div class="row">
                      <div class="col-md-7" >
                          <div class="col-item">
                              <div class="photo2">
                                  <img src="images\banners\router.jpg" style=" height: 600px;" class="img-responsive image2" alt="a" />
                                  <div class="middle2">
                                    <div class="text2">Beelink S1 Mini PC</div>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                          <div class="col-item">
                              <div class="photo2">
                                  <img src="images\banners\480x600.jpg"  class="img-responsive image2" alt="a" />
                                  <div class="middle2">
                                    <div class="text2">Top New Arrivals</div>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                          <div class="col-item">
                              <div class="photo2">
                                  <img src="images\products\macbook.jpg" class="img-responsive image2" alt="a" />
                                  <div class="middle2">
                                    <div class="text2">Macbook 2.0</div>
                                  </div>
                              </div>

                          </div>
                      </div>

                  </div>
              </div>

          </div>
             </div>
              </div>
          </div>
      </div>
</div>
