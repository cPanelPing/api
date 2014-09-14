cPanelPing Remote Restart API
=============================

This is the api responsible for automatic cPanel services restarting that is initiated upon reported downtime by cPanelPing.com monitoring services. 

Currently, this API restarts SQL, HTTP, and SSH.

This api is still a tad experimential, but has been tested to work on multiple servers thus far.

We welcome contributions.

Please use at your own risk.


Contents
==
1. compatibility.php | Checks your system compatibility with theRemoteFile.php

2. theRemoteFile.dev | A wrapper for developers to write their own commands specific to their own system. Before uploading to your site, rename to theRemoteFile.php

3. theRemoteFile.php | The remote restart api file. You may use this if you dont have any of your own commands you'd like us to run instead of ours.
