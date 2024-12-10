<?php

function getHtmlEmailAdmin(
  $name,
  $email,
  $ROOT_DOMAIN,
  $IMAGES_URL
) {
  $html = '
  <style>
  @import url(https://fonts.cdnfonts.com/css/Helvetica Neue-neue-9");
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  p {
    margin-bottom: 10px;
    font-size: 14px;
  }

  .info td {
    padding: 2px;
    font-size: 14px;
  }
  table {
    border-spacing: 0;
  }
</style>
<body
  style="
    background-color: #f0f0f0;
    font-family: Helvetica Neue, sans-serif;
    line-height: 1.6;
    padding: 10px 0;
    background-color: #fff;
  "
>
  <div style="width: 100%; max-width: 500px; margin: 10px auto">
    <div style="padding: 10px 10px 0px">
      <div style="text-align: left">
        <img
          src="' . $IMAGES_URL . '/fbs-lcss-logo-email.png"
          alt="lcss"
        />
      </div>
    </div>
    <div style="padding: 0 10px 0px">
      <h1
        style="
          padding-bottom: 20px;
          line-height: 1.2;
          margin: 20px 0 0px;
          font-size: 18px;
          width: 70%;
          color: black;
        "
      >
        New Trainee Application
      </h1>
      <div
        style="
          padding: 20px;
          border-top: 1px solid #f3f3f3;
          color: #505050;
          background-color: #f9f9f9;
          border: 1px solid #ddd;
        "
      >
      
        <p style="margin-bottom: 20px">
        There is a new trainee application that has been submitted to LCS System. 
        
        </p>
<p><strong>Name:</strong> ' . $name . '</p>
<p><strong>Email:</strong> ' . $email . '</p>
<p>Click the button below to see details.</p>
        

        <a
        href="' . $ROOT_DOMAIN . '/v2/admin/trainee"
          style="
            padding: 4px 25px;
            background-color: #3c78d8;
            color: #fff;
            display: inline-block;
            text-decoration: none;
            font-size: 12px;
            border-radius: 30px;
            margin-bottom: 10px;
          "
          >See details</a
        >

      </div>
    </div>
          <p style="font-size: 12px; padding: 0 10px">
            Having issues with the link? Try to paste this text on your browser
            URL:
            <a
              target="_blank"
              rel="nofollow"
              style="
                font-size: 12px;
                font-family: Helvetica Neue, sans-serif;
                text-decoration: none;
                color: #505050;
              "
              >' . $ROOT_DOMAIN . '/v2/admin/trainee</a
      >
          </p>
        </div>
      </div>

      <div
        style="
          text-align: center;
          padding: 20px 0px;
          border-top: 1px solid #ddd;
          margin: 0 40px;
        "
      >
        <p style="font-size: 10px; line-height: 1.4; opacity: 0.5">
          &copy; ' . date("Y") . ' All Rights Reserved <br />
          Frontline Business Solutions, Inc., Baloc Road, Brgy. San Ignacio
          <br />
          San Pablo City, 4000, Laguna, Philippines
        </p>
      </div>
    </div>
  </body>
';
  return $html;
}
