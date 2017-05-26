<?php
/*
Plugin Name: Love You to Death
Description: Let it speak for itself.
Author: Zach Akbar
Version: 1.3
Author URI: https://www.youtube.com/watch?v=xD5No_JRrZw
*/

function lytd_get_lyric() {
	/* showing some love to one of the greats */
	$lyrics = "In her place one hundred candles burning
As salty sweat drips from her breast.
her hips move and I can feel what they're saying, swaying
They say the beast inside of me's gonna get ya, get ya, get... yeah.
Yeah.
Black lipstick stains her glass of red wine
I am your servant, may I light your cigarette?
Those lips smooth, yeah I can feel what you're saying, praying
They say the beast inside of me's gonna get ya, get ya, get... yeah.
Yeah.
I beg to serve, your wish is my law
Now close those eyes and let me love you to death.
Shall I prove I mean what I'm saying?
Begging
I say the beast inside of me's gonna get ya, get ya, get.. yeah.
Let me love you to...
Let me love you to death.
To death.
Let me love you to...
Let me love you to death.
To death.
Am I good enough for you?
Am I good enough for you?
Am I?
For you?
Am I?
For you?
Am I good enough
For you?";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function lytd() {
	$chosen = lytd_get_lyric();
	echo "<p id='lytd'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'lytd' );

// We need some CSS to position the paragraph
function lytd_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#lytd {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'lytd_css' );

?>
