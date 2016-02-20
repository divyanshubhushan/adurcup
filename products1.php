<?php
  require_once("include/membersite_config.php");
if(isset($_POST['zone_submitted']))
{

    if($fgmembersite->Addzone())
    {

        header('Location: myzone.php');  
    }
    else
    {
        echo "Error in submitting the form...Please try again later";
    }
  
}

require_once("includes/post_login.php");
  require_once("includes/header2.php"); 
?>



 <main id="main-content" role="main">
            <div class="container">
                <div class="row">
                    
                    <div class="m-t-b clearfix">
                        <!-- SIDEBAR -->
                        <aside class="col-xs-12 col-md-3" style="padding-left:0">
                            <section class="sidebar push-up">
                            
                                <!-- CATEGORIES -->
                                <section class="side-section bg-white">
                                    <header class="side-section-header">
                                        <h3 class="side-section-title">PRODUCTS</h3>
                                    </header>
                                    <div class="side-section-content">
                                        <ul id="category-list" class="vmenu unstyled">
                                            <li style="border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-cups" class="prettyCheckable" data-label="Cups" data-labelPosition="right" value="cups" />
                                                <ul>
                                                    <li><input type="checkbox" id="check-cups-bubble_top" class="prettyCheckable" data-label="Bubble-Top Cups" data-labelPosition="right" value="cups-bubble_top" /></li>
                                                    <li><input type="checkbox" id="check-cups-flat_top" class="prettyCheckable" data-label="Flat-Top Cups" data-labelPosition="right" value="cups-flat_top" /></li>
                                                    <li><input type="checkbox" id="check-cups-kullad" class="prettyCheckable" data-label="Kullad" data-labelPosition="right" value="cups-kullad" /></li>
                                                    <li><input type="checkbox" id="check-cups-plastic_wine_glass" class="prettyCheckable" data-label="Plastic Wine Glass" data-labelPosition="right" value="cups-plastic_wine_glass" /></li>
                                                    
                                                        </ul>
                                            </li>
                                            <li style="border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-wraps" class="prettyCheckable" data-label="Wraps" data-labelPosition="right" value="wraps" />
                                                <ul>
                                                    <li><input type="checkbox" id="check-wraps-burger" class="prettyCheckable" data-label="Burger Wraps" data-labelPosition="right" value="wraps-burger" /></li>
                                                    <li><input type="checkbox" id="check-wraps-fries_holder" class="prettyCheckable" data-label="Fries Holder" data-labelPosition="right" value="wraps-fries_holder" /></li>
                                                    <li><input type="checkbox" id="check-wraps-roll" class="prettyCheckable" data-label="Roll Wraps" data-labelPosition="right" value="wrap-roll" /></li>
                                                    <li><input type="checkbox" id="check-wraps-tray_mat" class="prettyCheckable" data-label="Tray Mat" data-labelPosition="right" value="wrap-tray_mat" /></li>
                                                        </ul>
                                            </li>
                                            <li style="border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-box" class="prettyCheckable" data-label="Container" data-labelPosition="right" value="box" />
                                                <ul>
                                                    <li><input type="checkbox" id="check-box-paper_tiffin" class="prettyCheckable" data-label="Paper Tiffin" data-labelPosition="right" value="box-paper_tiffin" /></li>
                                                    <li><input type="checkbox" id="check-box-sandwich" class="prettyCheckable" data-label="Sandwich Box" data-labelPosition="right" value="box-sandwich" /></li>
                                                    <li><input type="checkbox" id="check-box-mithai" class="prettyCheckable" data-label="Mithai Box" data-labelPosition="right" value="box-mithai" /></li>
                                                
                                                        </ul>
                                            </li>
                                            <li style="border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-other" class="prettyCheckable" data-label="Other Options" data-labelPosition="right" value="other" />
                                                <ul>
                                                    <li><input type="checkbox" id="check-other-paper_plates" class="prettyCheckable" data-label="Paper Plates" data-labelPosition="right" value="other-paper_plates" /></li>
                                                    <li><input type="checkbox" id="check-other-spoon" class="prettyCheckable" data-label="Spoon" data-labelPosition="right" value="other-spoon" /></li>
                                                    <li><input type="checkbox" id="check-other-fork" class="prettyCheckable" data-label="Fork" data-labelPosition="right" value="other-fork" /></li>
                                                    <li><input type="checkbox" id="check-other-straw" class="prettyCheckable" data-label="Straw" data-labelPosition="right" value="other-straw" /></li>
                                                    <li><input type="checkbox" id="check-other-paper_bags" class="prettyCheckable" data-label="Paper Bags" data-labelPosition="right" value="other-paper_bags" /></li>
                                                    <li><input type="checkbox" id="check-other-paper_napkins" class="prettyCheckable" data-label="Paper Napkin" data-labelPosition="right" value="other-paper_napkins" /></li>
                                                    <li><input type="checkbox" id="check-other-bill_paper" class="prettyCheckable" data-label="Bill Paper" data-labelPosition="right" value="other-bill_paper" />
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="check-other-plastic_bowl" class="prettyCheckable" data-label="Plastic Bowl" data-labelPosition="right" value="other-plastic_bowl" />
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="check-other-lunch_plate" class="prettyCheckable" data-label="Lunch Plate" data-labelPosition="right" value="other-lunch_plate" />
                                                    </li>
                                                        </ul>
                                            </li>
                                            <!-- <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Burger Wraps" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Fries Holder" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Roll Wrap" data-labelPosition="right" value="men" />
                                            </li>
                                            <li style="padding-bottom: 7px;border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Tray Mat" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Paper Tiffin Box" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Sandwitch Box" data-labelPosition="right" value="men" />
                                            </li>
                                            <li style="padding-bottom: 7px;border-bottom: 1px solid #08c">
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Mithai Box" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Paper Plates" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Spoon" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Fork" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Straw" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Paper Bags" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Paper Napkin" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Bill Paper" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Plastic Bowl" data-labelPosition="right" value="men" />
                                            </li>
                                            <li>
                                                <input type="checkbox" id="check-men" class="prettyCheckable" data-label="Lunch Plate" data-labelPosition="right" value="men" />
                                            </li> -->
                                        </ul>
                                    </div>

                                    <!-- <div id="filter-by-size" class="side-section-content">
                                        <h4 class="side-section-subheader">Filter By Size</h4>
                                        <ul class="inline-li li-m-lg text-center unstyled">
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="X-Small / UK 8"><small>XS</small></a>
                                                <input class="filter-checkbox filter-size" value="XS" type="checkbox">
                                            </li>
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="Small / UK 10"><small>S</small></a>
                                                <input class="filter-checkbox filter-size" value="S" type="checkbox">
                                            </li>
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="Medium / UK 12"><small>M</small></a>
                                                <input class="filter-checkbox filter-size" value="M" type="checkbox">
                                            </li>
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="Large / UK 14"><small>L</small></a>
                                                <input class="filter-checkbox filter-size" value="L" type="checkbox">
                                            </li>
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="X-Large / UK 16"><small>XL</small></a>
                                                <input class="filter-checkbox filter-size" value="XL" type="checkbox">
                                            </li>
                                            <li>
                                                <a title="" data-original-title="" href="#" class="round-icon" data-toggle="tooltip" data-title="XX-Large"><small>XXL</small></a>
                                                <input class="filter-checkbox filter-size" value="XXL" type="checkbox">
                                            </li>
                                        </ul>
                                    </div> -->
                                    
                                    <footer class="side-section-footer text-center hide">
                                        <button type="button" id="btn-filter-cat" class="btn btn-primary btn-round uppercase">Clear Filters</button>
                                    </footer>
                                </section>
                                
                            </section>
                        </aside>
                        <!-- // SIDEBAR -->
                        <section class="col-xs-12 col-md-9" style="padding-left:0">
                            
                            <section class="products-wrapper">
                                <!-- DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
                                <!--LAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
                                
                                <section class="section" style="padding-bottom:0px;">
                                    
                                    <form class="clearfix" >
                                    
                                        <div class="col-md-12">

                                            <div class="col-md-3"  style="padding-left:0">
                                                <div class="form-group stylish-input">
                                                    <label class="row"  style="margin-left:30%"align="center" for="inputLocation">Price Range</label>
                                                    <div class="range-slider-container" style="padding-top:10px;">
                                                        <div class="range-slider" data-min="0" data-max="7" data-step="1" data-currency="₹"></div>
                                                        <div class="range-slider-value clearfix" style="margin-top:10px">
                                                            <span>Price: &ensp;</span>
                                                            <span class="min"></span>
                                                            <span class="max"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3" align="center" style="padding-left:0;padding-right:0">
                                                <div class="form-group stylish-input" id="filter-by-size">
                                                    <label style="font-weight:150%">Sort by</label>
                                                    <!-- trending latest discount -->
                                                    <ul class="inline-li li-m-lg text-center unstyled">
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" data-title="Trending" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg  "><small>Trending</small></a>
                                                            <input class="filter-checkbox filter-size" value="trending" type="checkbox">
                                                        </li>
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg " data-title="New" ><small>New</small></a>
                                                            <input class="filter-checkbox filter-size" value="new" type="checkbox">
                                                        </li>
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg  " data-title="Discount" ><small>Discount</small></a>
                                                            <input class="filter-checkbox filter-size" value="discount" type="checkbox">
                                                        </li>
                                                                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3" align="center" style="padding-left:0;padding-right:0">
                                                <div class="form-group stylish-input" id="filter-by-color">
                                                    <label >Material</label>
                                                    <!-- trending latest discount -->
                                                    <ul class="inline-li li-m-lg text-center unstyled">
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg  " data-title="paper" ><small>Paper</small></a>
                                                            <input class="filter-checkbox filter-colors" value="paper" type="checkbox">
                                                        </li>
                                                        
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg " data-title="thermocol" ><small>Thermocol</small></a>
                                                            <input class="filter-checkbox filter-colors" value="thermocol" type="checkbox">
                                                        </li>
                                                        <li style="margin:0">
                                                            <a title="" data-original-title="" href="#" data-toggle="tooltip" style="padding-left:3px;padding-right:3px;padding-top:5px;padding-bottom:5px; border:1px solid #3276b1;"class=" btn btn-defaultt  btn-lg  " data-title="plastic" ><small>Plastic</small></a>
                                                            <input class="filter-checkbox filter-colors" value="plastic" type="checkbox">
                                                        </li>
                                                                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            

                                            <div class="col-md-3" >
                                                <div class="form-group stylish-input">
                                                    
                                                    <a href="editor/" style="margin-top:15px" class="btn btn-default btn-lg btn-round"><i class="iconfont-edit"></i>Customize Yours</a>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xs-12 col-sm-4">
                                                <button type="reset" class="btn btn-default uppercase m-r-rs">reset</button>
                                                <button type="submit" class="btn btn-primary uppercase m-r-sm">submit</button>
                                            </div> -->
                                        </div>
                                        <!-- <div class="row">
                                            <div id="txtHint" class="col-xs-2 col-sm-2" style="background-color: #cccc33">
                                                Message area
                                            </div>
                                            <div id="txtHint2" class="col-xs-2 col-sm-2"></div>
                                            
                                        </div> -->
                                    </form>
                                </section>
                               <!--  <div id="feedback" style="position:fixed;right:0;top:220px;z-index:1001">
                                    <a href="#" onclick="feedback()">
                                        <img src="img/feedback.png">
                                    </a>
                                    
                                    <div class="modal fade" id="feedback_modal" tabindex="-1" role="dialog" aria-labelledby="feedbackLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="feedbackTitle">Tell us what you think.</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p style="padding-bottom:15px">Love us / have suggestions / ideas / feature requests?<code> Tell us</code> how we can improve our website.</p>
                                                        </div>
                                                    
                                                        <br>
                                                        <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="feedback_form">
                                                            <input id='feeback_submitted' name='feeback_submitted' type='hidden' value='1'>
                                                        
                                                            <div class="form-group" style="margin-bottom:20px">
                                                                <label class="col-sm-4 control-label">Email</label>
                                                                <div class="col-md-8"  style="margin-bottom:20px">
                                                                    <input class="form-control" id="email" name="email" placeholder="eg: abc@example.com"  type="text">
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">Mobile No.</label>
                                                                <div class="col-md-8"  style="margin-bottom:20px">
                                                                    <input class="form-control" id="mobile" name="mobile" placeholder="eg: 9684612318"  type="text">
                                                                </div>
                                                            </div>
                                                       
                                                     
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">Category</label>
                                                                <div class="col-md-8"  style="margin-bottom:20px">
                                                                    <select class="form-control"required=""  name="category">
                                                                    <option selected="true" style="display:none;">
                                                                        Select Option
                                                                    </option>
                                                                    <option>
                                                                         Improve this page
                                                                    </option>
                                                                    <option>
                                                                        Suggest new ideas/pages
                                                                    </option>
                                                                    <option>
                                                                        Shoping Experience
                                                                    </option>
                                                                    <option>
                                                                        adurcup.com is awesome
                                                                    </option>
                                                                    <option>
                                                                        General Feedback
                                                                    </option>
                                                                   
                                                                </select>
                                                                </div>
                                                            </div>
                                                    
                                                        
                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label">Message</label>
                                                                <div class="col-md-8"  style="margin-bottom:20px">
                                                                     <textarea class="form-control" name="address" placeholder="Tell us how you feel." required="" rows="2">
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        
                                                    
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- PRODUCT LAYOUT -->
                                <div class="products-layout grid add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price" style="">
                                    
                                    <div class="product" data-product-id="1" data-category="cups|cups-flat_top" data-brand="brand1" data-price="Rs.3.5" data-colors="paper" data-size="trending">
                                        <div class="entry-media" >
                                            <img data-src="images/cups.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">

                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                   
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">Trend</div>
                                                    </li>
                                                </ul>
                                               <!--  <div class="rate-bar circle ribbon" style="width:100px;border-radius:20%">
                                                    <p>min 1</p>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>The McDonald's Corporation is the world's largest chain of hamburger fast food restaurants, serving around 68 million customers daily in 119 countries across 35,000 outlets.</p>
                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 20000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="2" data-category="cups|cups-bubble_top" data-brand="brand1" data-price="2.75" data-colors="plastic" data-size="trending|new">
                                        <div class="entry-media" >
                                            <img data-src="images/bubble.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">Trend</div>
                                                    </li>
                                                    
                                                </ul>
                                               
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>The McDonald's Corporation is the world's largest chain of hamburger fast food restaurants, serving around 68 million customers daily in 119 countries across 35,000 outlets.</p>
                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 20000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="3" data-category="cups|cups-flat_top" data-brand="brand3" data-price="2.30" data-colors="plastic" data-size="">
                                        <div class="entry-media">
                                            <img data-src="images/Cup_4.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/women/swimwear/116796-0001_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>Cafe Coffee Day is India's favourite coffee shop for the young and the young at heart. We're part of India's largest coffee conglomerate, Amalgamated Bean Coffee Trading Company Limited (ABCTCL).</p>
                                            
                                                <p>Café Coffee Day – <b>A lot can happen over coffee</b></p>

                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="product" data-product-id="4" data-category="cups|cups-flat_top" data-brand="brand1" data-price="2.00" data-colors="paper" data-size="trending|new">
                                        <div class="entry-media">
                                            <img data-src="images/Cup_5.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">Trend</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/women/accessories/582120-0029_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Subway-Eat fresh</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Subway is an American fast food restaurant franchise that primarily sells submarine sandwiches (subs) and salads.</p>
                                            </div>
                                            <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product" data-product-id="5" data-category="cups|cups-kullad" data-brand="brand1" data-price="1.20" data-colors="clay" data-size="new">
                                        <div class="entry-media" >
                                            <img data-src="images/kullad.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>The McDonald's Corporation is the world's largest chain of hamburger fast food restaurants, serving around 68 million customers daily in 119 countries across 35,000 outlets.</p>
                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 20000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="6" data-category="cups|cups-kullad" data-brand="brand3" data-price="1.20" data-colors="clay" data-size="trending">
                                        <div class="entry-media">
                                            <img data-src="images/kullad_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">Trend</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/women/swimwear/116796-0001_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>Cafe Coffee Day is India's favourite coffee shop for the young and the young at heart. We're part of India's largest coffee conglomerate, Amalgamated Bean Coffee Trading Company Limited (ABCTCL).</p>
                                            
                                                <p>Café Coffee Day – <b>A lot can happen over coffee</b></p>

                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="product" data-product-id="8" data-category="cups|cups-kullad" data-brand="brand1" data-price="1.20" data-colors="clay" data-size="new">
                                        <div class="entry-media">
                                            <img data-src="images/kullad_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/women/accessories/582120-0029_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Subway-Eat fresh</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Subway is an American fast food restaurant franchise that primarily sells submarine sandwiches (subs) and salads.</p>
                                            </div>
                                            <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="product" data-product-id="7" data-category="cups|cups-plastic_wine_glass" data-brand="brand1|brand2" data-price="4.50" data-colors="plastic" data-size="new">
                                        <div class="entry-media">
                                            <img data-src="images/wine.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                

                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Pizza Hut</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Pizza Hut is an American restaurant chain and international franchise that offers different styles of pizza along with side dishes including salad, pasta, buffalo wings, breadsticks, garlic bread and desserts.</p>
                                            </div>
                                            <div class="entry-price">
                                                <strong class="price">₹ 20000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="9" data-category="wraps|wraps-burger" data-brand="brand3" data-price="0.60" data-colors="paper" data-size="new">
                                        <div class="entry-media">
                                            <img data-src="images/burger.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/women/swimwear/116796-0001_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <h5 class="entry-title">
                                                <a href="product.html"></a>
                                            </h5>
                                            <!-- <div class="entry-description visible-list">
                                                <p>Cafe Coffee Day is India's favourite coffee shop for the young and the young at heart. We're part of India's largest coffee conglomerate, Amalgamated Bean Coffee Trading Company Limited (ABCTCL).</p>
                                            
                                                <p>Café Coffee Day – <b>A lot can happen over coffee</b></p>

                                            </div> -->
                                            <!-- <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="product" data-product-id="10" data-category="wraps|wraps-fries_holder" data-brand="brand1" data-price="1.5" data-colors="paper" data-size="new">
                                        <div class="entry-media">
                                            <img data-src="images/fires.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">New</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/women/accessories/582120-0029_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Subway-Eat fresh</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Subway is an American fast food restaurant franchise that primarily sells submarine sandwiches (subs) and salads.</p>
                                            </div>
                                            <div class="entry-price">
                                                <strong class="price">₹ 10000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="product" data-product-id="11" data-category="wraps|wraps-fries_holder" data-brand="brand1|brand2" data-price="1.5" data-colors="paper" data-size="trending">
                                        <div class="entry-media">
                                            <img data-src="images/Fries_22.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    
                                                    <li>
                                                        <div class="circle ribbon ribbon-new">Trend</div>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="product" data-product-id="12" data-category="wraps|wraps-fries_holder" data-brand="brand1|brand2" data-price="1.5" data-colors="paper" data-size="">
                                        <div class="entry-media">
                                            <img data-src="images/Fries_1.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="13" data-category="wraps|wraps-fries_holder" data-brand="brand1|brand2" data-price="1.5" data-colors="paper" data-size="">
                                        <div class="entry-media">
                                            <img data-src="images/Fries_33.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="14" data-category="wraps|wrap-roll" data-brand="brand1|brand2" data-price="6.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/rwrap_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="15" data-category="wraps|wrap-roll" data-brand="brand1|brand2" data-price="0.60" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/rwrap_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="16" data-category="wraps|wrap-roll" data-brand="brand1|brand2" data-price="0.60" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/rwrap_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="17" data-category="wraps|wrap-tray_mat" data-brand="brand1|brand2" data-price="0.7" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tray.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="18" data-category="wraps|wrap-tray_mat" data-brand="brand1|brand2" data-price="0.7" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tray_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="19" data-category="wraps|wrap-tray_mat" data-brand="brand1|brand2" data-price="0.7" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tray_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="20" data-category="box|box-mithai" data-brand="brand1|brand2" data-price="5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sweet_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="21" data-category="box|box-mithai" data-brand="brand1|brand2" data-price="4" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sweet_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="product" data-product-id="22" data-category="box|box-pizza" data-brand="brand1|brand2" data-price="5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/pizza_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                

                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="23" data-category="box|box-paper_tiffin" data-brand="brand1|brand2" data-price="1.2" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tinbox.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="24" data-category="box|box-sandwich" data-brand="brand1|brand2" data-price="3.25" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sand_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="25" data-category="box|box-sandwich" data-brand="brand1|brand2" data-price="3.25" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sand_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                               

                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="26" data-category="box|box-sandwich" data-brand="brand1|brand2" data-price="3.25" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sand_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                

                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="27" data-category="other|other-paper_plates" data-brand="brand1|brand2" data-price="0.70" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/plate_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                               
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="28" data-category="other|other-paper_plates" data-brand="brand1|brand2" data-price="0.70" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/plate_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="29" data-category="other|other-paper_plates" data-brand="brand1|brand2" data-price="0.70" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/plate_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="30" data-category="other|other-paper_bucket" data-brand="brand1|brand2" data-price="6" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bucket_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="product" data-product-id="31" data-category="other|other-spoon" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/spoon_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="32" data-category="other|other-spoon" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/spoon_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="33" data-category="other|other-spoon" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/spoon_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="34" data-category="other|other-fork" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/fork_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="35" data-category="other|other-fork" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/fork_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="36" data-category="other|other-fork" data-brand="brand1|brand2" data-price="0.50" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/fork_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="37" data-category="other|other-straw" data-brand="brand1|brand2" data-price="0.15" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/straw_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="38" data-category="other|other-straw" data-brand="brand1|brand2" data-price="0.15" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/straw_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="39" data-category="other|other-straw" data-brand="brand1|brand2" data-price="0.15" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/straw_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="40" data-category="other|other-paper_napkins" data-brand="brand1|brand2" data-price="0.16" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/napkin_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="41" data-category="other|other-paper_napkins" data-brand="brand1|brand2" data-price="0.16" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/napkin_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="product" data-product-id="42" data-category="other|other-paper_bags" data-brand="brand1|brand2" data-price="4.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bag.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="43" data-category="other|other-paper_bags" data-brand="brand1|brand2" data-price="4.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bag_1.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="44" data-category="other|other-paper_bags" data-brand="brand1|brand2" data-price="4.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bag_2.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="45" data-category="other|other-paper_bags" data-brand="brand1|brand2" data-price="4.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bag_3.png" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="46" data-category="other|other-plastic_bowl" data-brand="brand1|brand2" data-price="2.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bowl_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="47" data-category="other|other-plastic_bowl" data-brand="brand1|brand2" data-price="2.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bowl_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="48" data-category="other|other-plastic_bowl" data-brand="brand1|brand2" data-price="2.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/bowl_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="49" data-category="other|other-lunch_plate" data-brand="brand1|brand2" data-price="5.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/lunch_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="50" data-category="other|other-lunch_plate" data-brand="brand1|brand2" data-price="5.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/lunch_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="51" data-category="other|other-lunch_plate" data-brand="brand1|brand2" data-price="5.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/lunch_3.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="52" data-category="other|other-bill_paper" data-brand="brand1|brand2" data-price="1.50" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/receipt_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>                         
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="53" data-category="other|other-thermo_plate" data-brand="brand1|brand2" data-price="1.5" data-colors="thermocol" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tplates_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="54" data-category="other|other-thermo_glass" data-brand="brand1|brand2" data-price="1.5" data-colors="thermocol" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tglass_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="55" data-category="other|other-thermo_bowl" data-brand="brand1|brand2" data-price="1.75" data-colors="thermocol" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/tbowl_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                               
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="56" data-category="other|other-stirrer" data-brand="brand1|brand2" data-price="0.15" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/stirrer_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="57" data-category="other|other-muffin" data-brand="brand1|brand2" data-price="0.80" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/muffin_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product" data-product-id="58" data-category="other|other-lunch_plate" data-brand="brand1|brand2" data-price="5.0" data-colors="plastic" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/lunch_2.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product" data-product-id="59" data-category="other|other-Mithai" data-brand="brand1|brand2" data-price="4.5" data-colors="paper" data-size="L|XL|XXL">
                                        <div class="entry-media">
                                            <img data-src="images/sweet_1.jpg" alt="" class="lazyLoad thumb" />
                                            <div class="hover">
                                                <a href="#" class="entry-url"></a>
                                                <ul class="icons unstyled">
                                                    <!-- <li>
                                                        <div class="circle ribbon ribbon-sale">Trending</div>
                                                    </li> -->
                                                    <!-- <li>
                                                        <a href="images/000312-2259_1_t.jpg" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
                                                    </li> -->
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="entry-main">
                                            <!-- <h5 class="entry-title">
                                                <a href="product.html">Dominos</a>
                                            </h5>
                                            <div class="entry-description visible-list">
                                                <p>Domino's is the second-largest pizza chain in the United States (after Pizza Hut) and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.</p>
                                            </div>
                                            <div class="entry-price">
                                                <s class="entry-discount">₹ 20000</s>
                                                <strong class="accent-color price">₹ 15000</strong>
                                                <a href="#" class="btn btn-round btn-default add-to-cart visible-list">Add to Cart</a>
                                            </div> -->
                                            <div class="entry-links clearfix">
                                                <a href="#" class="pull-left m-r">+ Wishlist</a>
                                                <a href="#" class="pull-right">+ Compare</a>
                                            </div>
                                        </div>
                                    </div>

                            
                                    
                                </div>
                                <!-- // PRODUCT LAYOUT -->
                            </section>
                            
                        </section>
                    </div>
                    
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <!-- WIDGET AREA -->
            <!-- // WIDGET AREA -->
            <div class="footer-sub">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-6" align="center">
                             © 2015 Adurcup.com . All Rights Reserved.
                        </div>
                        <div class="col-md-6" align="center">
                             <a href="http://accelerate.businessworld.in/"><img src="img/home/BW.png"></a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </footer>
</div>
<!-- // PAGE WRAPPER -->

<!-- Essential Javascripts -->
<script src="js/minified.min.js"></script>
<!-- // Essential Javascripts -->

<script type="text/javascript">
            
         $(document).ready(function() {

            
                $('.product').on('click', function(e){
                   var target_category = $(this).data("category");
                   var  target_im     = $(this).find('img').attr("src");

                    
                   var target_product_id = $(this).data('product-id');
                   var string_url = "product.php?" + "id=" + target_product_id ;
                           /*console.log(target_category);
                           console.log(target_img);
                           console.log(target_product_id);*/
                    
                           window.location = string_url;
                  
                        
                 
                });

                 $("#ad_register_btn").click(function(){
                    $("#ad_login").hide();
                     $("#ad_register").show();
                     $(".modal-title").text('Sign-up to get started!');
                     $(".state_info").text('Already have an acoount?');
                     $(".button_info").text('Sign Up');
                     $(".register_forgot").hide();
                  
                     $("#ad_login_btn").show();
                     $("#ad_register_btn").hide();

                 });
                 $("#ad_login_btn").click(function(){
                    $("#ad_login").show();
                     $("#ad_register").hide();
                     $(".modal-title").text('Login to your account ');
                     $(".state_info").text("Don't have an account?");
                     $(".button_info").text('Log In');
                     $("#ad_login_btn").hide();
                     $("#ad_register_btn").show();
                     $(".register_forgot").show();

                 });

            $("form :input").on("keypress", function(e) {
                return e.keyCode != 13;
            });
              
            


             $('#ad_reg_form').bootstrapValidator({
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    
                    fields: {
                        
                        confirmpass: {
                            validators: {
                                identical: {
                                    field: 'password',
                                    message: 'The password does not match'
                                }
                            }
                        },
                        contact: {
                            validators: {
                                between: {
                                    min: 1000000000,
                                    max: 9999999999,
                                    message: 'Enter your 10-digit contact number'
                                }
                            }
                        },
                        email:{
                            validators:{
                                emailAddress: {
                                message: 'Not a valid email address'
                                }

                            }
                        }

                    } ,  
                    onError: function(e) {
                        
                        $('#error').modal('show')
                    }
                  
                });

                
                
                function randomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1) + min);
                };

                // Generate a sum of two random numbers
                function generateCaptcha() {
                    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
                };

                generateCaptcha();

                

                
            });
</script>
    <!-- Particular Page Javascripts -->
    <script src="js/jquery.nouislider.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/products.js"></script>
    <script src="dist/js/bootstrapValidator.js" type="text/javascript"></script>
    <!-- // Particular Page Javascripts -->
       <?php include("includes/login_popup.php"); ?>
                                        
</body>


</html>