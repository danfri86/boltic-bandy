<?php get_header(); ?>

<?php // Specificera mer om dom poster vi vill ha inom ()
query_posts("post_type=post&posts_per_page=1"); ?>
<?php if (have_posts()) :
	// Om det finns poster så kan vi göra något här
?>
<?php while (have_posts()) : the_post();
	// Här körs loopen för dom poster som finns
?>
	
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bannerimg' ); ?>
	<div class="site--intro" style="background:url(<?php echo $image[0] ?>);">
		<div class="text">
			<div class="container">
				<a href="<?php the_permalink(); ?>">
					<span>
				    	<h1><b>SENASTE: </b><?php the_title(); ?></h1>
				    	<?php the_excerpt(); ?>
				 	</span>
					
					<a class="btn">Läs mer <i class="fa fa-chevron-right"></i></a>
				</a>
			</div>
		</div>
	</div>

<?php endwhile; else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>
<?php wp_reset_query(); // Nollställ loopen ?>




	<div class="container" role="main">
	 <div class="main-content">
	    <div class="box-12">
	       <div class="puff nyheter">
	          <h3>nyheter</h3>
	          <div class="nyhet--container">
	             <div class="nyhet--bild box" style="background:url('http://www.danielfriberg.se/wp-content/uploads/2013/09/biceps-1-780x430.jpg');"></div>
	             <div class="nyhet--innehall box">
	                <h2>Förlust i hemmapremiären</h2>
	                <small>10 november 2013</small>
	                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
	                <!--<a href="" class="btn"> Läs mer <i class="fa fa-long-arrow-right"></i></a>-->
	             </div>
	          </div>
	          <div class="nyhet--container">
	             <div class="nyhet--bild box" style="background:url('http://www.scaryfootball.com/wp-content/uploads/2013/06/cristiano-ronaldo-new-hair-style-fashion-transfer-real-madrid-manchester-united.jpg');"></div>
	             <div class="nyhet--innehall box">
	                <h2>Förlust i hemmapremiären</h2>
	                <small>10 november 2013</small>
	                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... </p>
	                <!--<a href="" class="btn"> Läs mer <i class="fa fa-long-arrow-right"></i></a>-->
	             </div>
	          </div>
	          <a href="" class="btn">Till nyhetsarkivet <i class="fa fa-long-arrow-right"></i></a>
	       </div>
	    </div>
	    <div class="box-6">
	       <div class="puff nastamatch">
	          <h3>Nästa match</h3>
	          <div class="box-12 logos">
	             <span class="box-5 phone-6"><img src="http://www.relita.se/data/galleri/idrott/vsk-bandy.gif"></span>
	             <span class="box-2 vs phone-hidden"><small>vs.</small></span>
	             <span class="box-5 phone-6"><img src="http://4.bp.blogspot.com/-koEU1sIamAc/UneWRNhs_9I/AAAAAAAAi4w/vdvEWSk3Ls4/s1600/Hammarby+IF.gif"></span>
	          </div>
	          <span class="lagen"><small><i class="fa fa-flag"></i> IF Boltic vs. Hammarby</span>
	          <span class="arena"><i class="fa fa-map-marker"></i> Friends Arena</span>
	          <span class="tid"><i class="fa fa-clock-o"></i> Söndagen 24/11 kl 15.00</span></small>
	       </div>
	    </div>
	    <div class="box-6">
	       <div class="puff ovrigt">
	          <h3>övrigt</h3>
	          <h2>Knatteträning på söndag</h2>
	          <small>10 november 2013</small>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
	          <a href="" class="btn">Läs mer <i class="fa fa-chevron-right"></i></a>
	       </div>
	    </div>
	    <div class="box-12">
	       <div class="puff boltic">
	          <h3>Bli en del av boltic</h3>
	          <div class="box-6">
	             <div class="box-4"><img class="sponsor phone-6 center" src="img/sponsor.png" alt="" width="140"></div>
	             <div class="box-8">
	                <h2>Sponsra</h2>
	                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.	
	                </p>
	                <a href="#" class="btn">Sponsra <i class="fa fa-chevron-right"></i></a>
	             </div>
	          </div>
	          <div class="box-6">
	             <div class="box-4"><img class="phone-6 center" src="img/member.png" alt="" width="100%"></div>
	             <div class="box-8">
	                <h2>Bli medlem</h2>
	                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	                <a href="#" class="btn">Bli medlem <i class="fa fa-chevron-right"></i></a>
	             </div>
	          </div>
	       </div>
	    </div>
	    <div class="box-6">
	       <div class="puff">
	          <h3>Kalender</h3>
	          <div class="calendar">
	             <p>Månad</p>
	          </div>
	       </div>
	    </div>
	    <div class="box-6">
	       <div class="puff ovrigt">
	          <h3>annons</h3>
	          <h2>Volvo sponsrar</h2>
	          <small>10 november 2013</small>
	          <p>Lorem ipsum sit amet, consectetur adipiscing elit. Lorem dolor sit amet, consectetur adipiscing elit...</p>
	          <a href="" class="btn">Läs mer <i class="fa fa-chevron-right"></i></a>
	       </div>
	    </div>
	    <!--/MAIN-->
	 </div>
	 <div class="sidebar box">
	    <div class="box-12 social">
	       <a href="" class="fb"><i class="fa fa-facebook"></i> Följ på Facebook</a>
	       <a href="" class="twit"><i class="fa fa-twitter"></i> Följ på Twitter</a>
	       <div class="box-12 nyhetsbrev">
	          <h3><i class="fa fa-envelope-o"></i> Nyhetsbrev</h3>
	          <p>Senaste nyheterna direkt i mailen.</p>
	          <input type="text" placeholder="Din e-mailadress">
	       </div>
	    </div>
	    <div class="box-12 tabellen">
	       <h3><i class="fa fa-table"></i> Tabellen</h3>
	       <iframe height="220" width="100%" src="http://templates.lagta.idrottonline.se/ft.aspx?scr=tablemedium&ftid=2&sportid=5"></iframe>
	    </div>
	    <div class="box-12 gastbok">
	       <h3><i class="fa fa-comment-o"></i> Skriv i gästboken</h3>
	       <input type="text" placeholder="Ditt namn">
	       <input type="text" placeholder="Ditt meddelande">
	       <a href="" class="btn">Skicka <i class="fa fa-chevron-right"></i></a>
	    </div>
	    <div class="box-12 alaget">
	       <h3><i class="fa fa-user"></i> A-laget</h3>
	       <div class="box-12">
	          <img src="http://vskbandy.se/wp-content/uploads/2013/11/AkselEkblom.jpg">
	          <p> <span>#20</span> Jonatan Lidholm</p>
	       </div>
	    </div>
	 </div>
	 <!-- TABLET SIDEBAR -->
	 <div id="sidr" class="toggleSidebar">
	    <ul>
	       <a id="menuTablet" href="javascript:void(0)">x <span>stäng</span></a>
	       <li>Nyheter <small>Senaste nyheterna</small> <i class="fa fa-chevron-right"></i></li>
	       <li>Laget <small>Allt om laget</small> <i class="fa fa-chevron-right"></i></li>
	       <li>Historik <small>Då & nu</small> <i class="fa fa-chevron-right"></i></li>
	       <li>Ungdom <small>Vår framtid</small> <i class="fa fa-chevron-right"></i></li>
	       <li>Gästbok <small>Klotterplank</small> <i class="fa fa-chevron-right"></i></li>
	       <li>Kontakt <small>Personer & kansli</small> <i class="fa fa-chevron-right"></i></li>
	    </ul>
	    <div class="box-12 social">
	       <a href="" class="fb"><i class="fa fa-facebook"></i> Följ på Facebook</a>
	       <a href="" class="twit"><i class="fa fa-twitter"></i> Följ på Twitter</a>
	       <div class="box-12 nyhetsbrev">
	          <h3><i class="fa fa-envelope-o"></i> Nyhetsbrev</h3>
	          <p>Senaste nyheterna direkt i mailen.</p>
	          <input type="text" placeholder="Din e-mailadress">
	       </div>
	    </div>
	    <div class="box-12 tabellen">
	       <h3><i class="fa fa-table"></i> Tabellen</h3>
	       <iframe height="220" width="100%" src="http://templates.lagta.idrottonline.se/ft.aspx?scr=tablemedium&ftid=2&sportid=5"></iframe>
	    </div>
	    <div class="box-12 gastbok">
	       <h3><i class="fa fa-comment-o"></i> Skriv i gästboken</h3>
	       <input type="text" placeholder="Ditt namn">
	       <input type="text" placeholder="Ditt meddelande">
	       <a href="" class="btn">Skicka <i class="fa fa-chevron-right"></i></a>
	    </div>
	    <div class="box-12 alaget">
	       <h3><i class="fa fa-user"></i> A-laget</h3>
	       <div class="box-12">
	          <img src="http://vskbandy.se/wp-content/uploads/2013/11/AkselEkblom.jpg">
	          <p> <span>#20</span> Jonatan Lidholm</p>
	       </div>
	    </div>
	 </div>
	</div>

<?php get_footer(); ?>