
<?php if ( get_theme_mod( 'gtm_pixel_id' ) ) : ?>
<!-- GTM PIXEL -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo get_theme_mod( 'gtm_pixel_id' ); ?>');</script>
<!-- END GTM PIXEL -->
<?php endif; ?>

<?php if ( get_theme_mod( 'ga_pixel_id' ) ) : ?>
<!-- GA -->
<script async src='https://www.googletagmanager.com/gtag/js?id=<?php echo get_theme_mod( 'ga_pixel_id' ); ?>'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo get_theme_mod( 'ga_pixel_id' ); ?>');
</script>
<!-- END GA -->
<?php endif; ?>

<?php if ( get_theme_mod( 'facebook_pixel_id' ) ) : ?>
<!-- FB PIXEL -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo get_theme_mod( 'facebook_pixel_id' ); ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=<?php echo get_theme_mod( 'facebook_pixel_id' ); ?>&ev=PageView&noscript=1"
/></noscript>
<!-- END FB PIXEL -->
<?php endif; ?>

<?php if ( get_theme_mod( 'custom_head_code' ) ) : ?>
<!-- CUSTOM HEAD CODE -->
<?php echo get_theme_mod( 'custom_head_code' ); ?>
<!-- END CUSTOM HEAD CODE -->
<?php endif; ?>
