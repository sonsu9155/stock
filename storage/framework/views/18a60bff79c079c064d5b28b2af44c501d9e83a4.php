<html>
<body>
  <button onclick="javascript:screenshare();" disabled id="shareBtn">Share your screen</button>
  <div id="camera-publisher" hidden></div>
  <div id="screen-publisher" hidden></div>
  <div id="camera-subscriber" hidden></div>
  <div id="screen-subscriber"></div>
  <script src="https://static.opentok.com/v2/js/opentok.js"></script>
  <script type="text/javascript">

    // Go to https://dashboard.tokbox.com/ to get your OpenTok API Key and to generate
    // a test session ID and token:
    var apiKey = '46319772';
    var sessionId = '1_MX40NjMxOTc3Mn5-MTU1NjY0ODgxODQ5Mn5KaUp6clp6eFVkWEM4NWhSR3k3SGhEOFp-fg';
    var token = 'T1==cGFydG5lcl9pZD00NjMxOTc3MiZzaWc9Y2Q0ZTAyYTQyMGY4MDZkMTI1YjQ4YTIxMWE2NTMxZTZkN2M1ZTcxNTpzZXNzaW9uX2lkPTFfTVg0ME5qTXhPVGMzTW41LU1UVTFOalkwT0RneE9EUTVNbjVLYVVwNmNscDZlRlZrV0VNNE5XaFNSM2szU0doRU9GcC1mZyZjcmVhdGVfdGltZT0xNTU2NjQ4ODMwJm5vbmNlPTAuMzA5Mzk0NTIzNzE0MTAxNiZyb2xlPXB1Ymxpc2hlciZleHBpcmVfdGltZT0xNTU5MjQwODI0JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9';
    // Replace this with the ID for your Chrome screen-sharing extension, which you can
    // get at chrome://extensions/:

    var extensionId = 'ajhifddimkapgcifgcodmmfdlknahffk';

    // If you register your domain with the the Firefox screen-sharing whitelist, instead of using
    // a Firefox screen-sharing extension, set this to the Firefox version number, such as 36, in which
    // your domain was added to the whitelist:

    var ffWhitelistVersion; // = '36';

    var session = OT.initSession(apiKey, sessionId);

    session.connect(token, function(error) {
      if (error) {
        alert('Error connecting to session: ' + error.message);
        return;
      }
      // publish a stream using the camera and microphone:
      var publisher = OT.initPublisher('camera-publisher');
      session.publish(publisher);
      document.getElementById('shareBtn').disabled = false;
    });

    session.on('streamCreated', function(event) {
      if (event.stream.videoType === 'screen') {
        // This is a screen-sharing stream published by another client
        var subOptions = {
          width: event.stream.videoDimensions.width / 2,
          height: event.stream.videoDimensions.height / 2
        };
        session.subscribe(event.stream, 'screen-subscriber', subOptions);
      } else {
        // This is a stream published by another client using the camera and microphone
        session.subscribe(event.stream, 'camera-subscriber');
      }
    });

    // For Google Chrome only, register your extension by ID,
    // You can find it at chrome://extensions once the extension is installed
    OT.registerScreenSharingExtension('chrome', extensionId, 2);

    function screenshare() {
      OT.checkScreenSharingCapability(function(response) {
        console.info(response);
        if (!response.supported || response.extensionRegistered === false) {
          alert('This browser does not support screen sharing.');
        } else if (response.extensionInstalled === false
            && (response.extensionRequired || !ffWhitelistVersion)) {
          alert('Please install the screen-sharing extension and load this page over HTTPS.');
        } else if (ffWhitelistVersion && navigator.userAgent.match(/Firefox/)
          && navigator.userAgent.match(/Firefox\/(\d+)/)[1] < ffWhitelistVersion) {
            alert('For screen sharing, please update your version of Firefox to '
              + ffWhitelistVersion + '.');
        } else {
          // Screen sharing is available. Publish the screen.
          // Create an element, but do not display it in the HTML DOM:
          var screenSharingPublisher = OT.initPublisher(
            'screen-publisher',
            { videoSource : 'screen' },
            function(error) {
              if (error) {
                alert('Something went wrong: ' + error.message);
              } else {
                session.publish(
                  screenSharingPublisher,
                  function(error) {
                    if (error) {
                      alert('Something went wrong: ' + error.message);
                    }
                  });
              }
            });
          }
        });
    }
  </script>
</body>
</html>
