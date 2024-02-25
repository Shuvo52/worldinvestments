<style  type="text/css" scoped>
    .wi-sliders-field {
      width: 100%;
      position: relative;
      height: 900px;
      overflow: hidden;
    }
    .wi-sliders-field .wi-sl-item {
      width: 100%;
      position: relative;
    }
    .wi-sliders-field .wi-sl-item .wi-sl-img {
      position: relative;
      width: 100% !important;
    }
    .wi-sliders-field .wi-sl-item h1 {
      position: absolute;
      z-index: 999;
      display: block;
      top: 41%;
      left: 0;
      right: 0;
      margin: 0 auto;
      width: 60%;
      text-align: center;
      font-size: 65px;
      background: #C6B47780 !important;
      color: #ffffff
    }
</style>
<section class="lazy slider wi-sliders-field" data-sizes="50vw">
    <div class="wi-sl-item">
      <img class="wi-sl-img" data-lazy="<?php echo wp_kses_post( $link1 );?>" data-srcset="<?php echo wp_kses_post( $link1 );?>" data-sizes="100vw">
      <h1><?php echo wp_kses_post( $title1 );?></h1>
    </div>
    <div class="wi-sl-item">
      <img class="wi-sl-img" data-lazy="<?php echo wp_kses_post( $link2 );?>" data-srcset="<?php echo wp_kses_post( $link2 );?>" data-sizes="100vw">
      <h1><?php echo wp_kses_post( $title2 );?></h1>
    </div>
    <div class="wi-sl-item">
      <img class="wi-sl-img" data-lazy="<?php echo wp_kses_post( $link3 );?>"  data-srcset="<?php echo wp_kses_post( $link3 );?>" data-sizes="100vw">
      <h1><?php echo wp_kses_post( $title3 );?></h1>
    </div>
</section>

