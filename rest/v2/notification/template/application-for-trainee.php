<?php

function getHtmlEmailTrainee(
  $name,
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
     
      <div
        style="
          padding: 20px;
          border-top: 1px solid #f3f3f3;
          color: #505050;
          background-color: #f9f9f9;
          border: 1px solid #ddd;
        "
      >
        <p>Hi ' . $name . ',</p>
        <p style="margin-bottom: 10px; text-align: justify;
                      text-indent: 30px;">
        We would like to inform you that we have received your application on our On-the-Job Training / Immersion Program. The head of our Learning Center Solutions and Human Resource staff will be waiting for the documents that you need to submit for you to become an official trainee. The list of requirements was sent by Ms. Kennie Deriquito in a separate email. Once your application is approved, you will receive an invitation to Google Meeting for the official start of training.
        
        </p>

<p
                    style="
                      
                      text-align: justify;
                      text-indent: 30px;
                    "
                  >
                    Thank you for considering Frontline Business Solutions, Inc. as your
                    industry partner in your On-the-Job Training / Immersion Program.
                  </p>

<hr style="border: 0.5px solid #ddd; margin: 30px 0" />

                  <p style="text-align: left; ">
                  Your Growth Partner, <br />
                  <span
                    style="
                      font-weight: 700;
                      text-transform: uppercase;
                      text-align: left;
                    "
                  >
                    The FBS Team
                  </span>
                </p>


      </div>
    </div>
      
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
