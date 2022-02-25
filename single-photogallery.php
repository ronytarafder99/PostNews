<?php get_header(); ?>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-story" src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<script async custom-element="amp-story-auto-ads" src="https://cdn.ampproject.org/v0/amp-story-auto-ads-0.1.js"></script>
<style amp-custom>
    * {
        box-sizing: border-box;
    }

    footer,
    header {
        display: none;
    }

    amp-story * {
        color: white;
    }

    amp-story-page {
        background: white;
    }

    amp-story h1 {
        font-size: 46px;
    }

    amp-story h2 {
        font-size: 36px;
    }

    amp-story p {
        font-size: 16px;
        line-height: 24px;
    }

    .bold {
        font-weight: bold;
    }

    .bottom {
        align-content: end;
    }

    .medium {
        font-weight: 600;
    }

    .first {
        padding-top: 65px;
    }

    .last {
        position: absolute;
        bottom: 0;
        font-size: 1.3rem;
        left: 0;
        padding: 15px;
        margin-bottom: 0 !important;
        background: linear-gradient(360deg, #000000, #00000000);
    }

    .blue {
        color: #4285F4;
    }

    .twenty-px {
        font-size: 20px;
    }

    .center {
        text-align: center;
    }

    .lh30 {
        line-height: 30px;
    }

    .icon {
        background-image: url(https://ampbyexample.com/img/AMP-Brand-White-Icon.svg);
        background-repeat: no-repeat;
        background-size: 50px 50px;
        height: 50px;
        object-fit: contain;
        width: 50px;
    }

    .byline {
        letter-spacing: 1.28px;
        padding-bottom: 58px;
    }

    .introducing * {
        line-height: 42px;
    }

    .subtitle-page {
        padding-top: 80px;
    }

    .button {
        align-items: center;
        border: 4px solid #FFFFFF;
        color: #FFFFFF;
        display: flex;
        height: 60px;
        margin: 0 auto;
        max-width: 240px;
        text-decoration: none;
    }

    .button p {
        font-size: 20px;
        width: 100%;
    }

    amp-ad[template="image-template"] img,
    amp-ad[template="video-template"] {
        object-fit: cover;
    }

    ::cue {
        background-color: rgba(0, 0, 0, 0.75);
        font-size: 24px;
        line-height: 1.5;
    }
</style>

<amp-story standalone title="Key Highlights of AMP Conf 2018" publisher="The AMP team" publisher-logo-src="https://ampbyexample.com/img/AMP-Brand-White-Icon.svg" poster-portrait-src="https://ampbyexample.com/img/overview.jpg">

    <!-- <amp-story-auto-ads>
      <script type="application/json">
        {
          "ad-attributes": {
            "type": "doubleclick",
            "data-slot": "/30497360/a4a/amp_story_dfp_example"
          }
        }
      </script>
    </amp-story-auto-ads> -->

    <?php
    // Use below code to show metabox values from anywhere
    $id = get_the_ID();
    $banner_img = get_post_meta($id, 'post_banner_img', true);
    $banner_img = explode(',', $banner_img);
    if (!empty($banner_img)) {
    ?>
        <table class="plugin-detail-tabl" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <?php foreach ($banner_img as $attachment_id) { ?>
                    <amp-story-page id="page-7">
                        <amp-story-grid-layer template="fill">
                            <amp-img width="400" height="750" layout="fill" src="<?php echo wp_get_attachment_url($attachment_id); ?>"></amp-img>
                        </amp-story-grid-layer>
                        <amp-story-grid-layer template="vertical" class="bottom">
                            <h1 class="bold"></h1>
                            <p class="last"><?php the_title(); ?></p>
                        </amp-story-grid-layer>
                    </amp-story-page>
                <?php } ?>
            </tbody>
        </table>
    <?php
    } ?>
    <?php get_footer(); ?>