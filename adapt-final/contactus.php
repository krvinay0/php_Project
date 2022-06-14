<?php include 'header.php';?>

<div class="page-title">
    <div class="title-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="h1-title">Contact Us</h1>
                    </div><!-- /.page-title-heading -->
                    <ul class="breadcrumbs">
                        <li><a href="#" title="">Home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li>Contact Us</li>
                    </ul><!-- /.breadcrumbs -->
                </div>
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="flat-row flat-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-title style1 center">
                    <h2>Get in touch</h2>
                </div>
                <div class="flat-contact-form">
                    <form id="contactform"  method="post" action="./contact/contact-process.php" class="form-info">
                        <div class="field-row">
                            <div class="one-three">
                                <p class="input-info"><input type="text" name="your-name" id="name" value="" placeholder="Your name *" required></p>
                            </div>
                            <div class="one-three">
                                <p class="input-info"><input type="email" name="your-email" id="email" value="" placeholder="Email Address *" required></p>
                            </div>
                            <div class="one-three">
                                <p class="input-info"><input type="text" name="your-phone" id="phone" value="" placeholder="Phone numbers *" required></p>
                            </div>
                        </div>
                        <div class="input-text">
                            <textarea id="message-contact" name="your-message" placeholder="Message *" required></textarea>
                        </div>
                        <div class="btn-submit">
                            <button type="submit">SEND MESSAGE</button>
                        </div>
                    </form> <!-- /.flat-form-info -->
                </div>
            </div> <!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->  

<!-- map -->
<section class="flat-row pdmap">
    <div class="flat-maps" data-address="Cornwall, Vermont, Hoa Kỳ" data-height="500" data-images="images/map/map-1.png" data-name="Themesflat Map"></div>
    <div class="gm-map">                
        <div class="map"></div>                        
    </div>
</section>

<?php include 'footer.php';?>
