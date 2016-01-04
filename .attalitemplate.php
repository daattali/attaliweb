<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?php
/*
Dean Attali, Feb 2013
This template is used for the http://attali.ws website in order to share pictures and other files with family and friends.
To use this template, every folder that is created needs to have an "index.php" file with the following lines as content:

		<?php
		// define some variables that the attalitemplate.php will need
		// __DIR__ is something like '/homepages/20/d93584634/htdocs/attali/France/Day 1'
		// ROOT will be something like '/homepages/20/d93584634/htdocs/attali/'
		$attaliIdx = strpos(__DIR__, 'attali');
		$root = substr(__DIR__, 0, $attaliIdx+strlen('attali/'));
		define(ROOT, $root);
		define(IMAGES_DIR, '/.images/');
		define(DIR, __DIR__);

		// use the generic template that we built 
		require ROOT . '.attalitemplate.php';
		?>

It shows all child directories that are available to navigate to, all images in the directory, and all other files.
Every file/folder that begins with the period character (.) is ignored and not shown.
Use the .htaccess files to password-protect files or folders
		
If you forget to create the index.php file, then by default the Apache index will be shown, which lists all the files in the directory
*/
?>

<html>

<head>
<style type="text/css">
body {
	background: url(data:image/jpeg;base64,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);
	font-family:arial;
}

img {
	border: 0 none;
	outline: 0 none;
}

.pagetitle {
	font-size:2em;
	font-weight:bold;
	margin:5px 0 10px;
}

.folderbox {
	padding:5px;
	border:1px solid #777;
	background:#FFF;
	text-align:center;
	float:left;
	cursor:pointer;
	margin-right:10px;
}
.folderbox:hover{
	background:#F7F7F7;
	transition: all 500ms;
	-moz-transition: all 500ms;
	-webkit-transition: all 500ms;
	-o-transition: all 500ms;
}

.folderbox img {
	height:50px;
	width:50px;
}

#images {
	margin: 25px 0;
	border: 1px solid #aaa;
	padding: 5px 10px;
	background: #fcfcfc;
	float: left;
}

#images select {
	font-size:0.75em;
	margin: 0 30px 10px 0;
}

</style>
</head>

<body style="font-size:1.5em;margin:10px;">

<?php
// relativeDir will be something like 'France/Day 1'
$relativeDir = substr(DIR, strlen(ROOT));
$prevDirs = $relativeDir ? explode('/',$relativeDir) : array();

// show the title of the page and basic navigation (go home/go up)
if(count($prevDirs) == 0) {
	echo '<div class="pagetitle">Attali Homepage</div>';
	echo '<a href="/" class="folderbox"><img src="' . IMAGES_DIR . 'homeicon.jpg"/><div>Attali Home</div></a>';
} else if(count($prevDirs) == 1) {
	echo '<div class="pagetitle">' . $prevDirs[0] . '</div>';
	echo '<a href="/" class="folderbox"><img src="' . IMAGES_DIR . 'homeicon.jpg"/><div>Attali Home</div></a>';
} else {
	echo '<div class="pagetitle">' . end($prevDirs) . '</div>';
	echo '<a href="/" class="folderbox"><img src="' . IMAGES_DIR . 'homeicon.jpg"/><div>Attali Home</div></a>';
	echo '<a href=".." class="folderbox"><img src="' . IMAGES_DIR . 'folderupicon.jpg"/><div>Previous</div></a>';
}

// read all the files in the current directory and build a list of all directories, images, and other files
$files = scandir(DIR);
$dirs = array();
$images = array();
$vids = array();
$extras = array();
foreach($files as $f){
	// if the file is hidden (or is the current/parent directory), do nothing
	if(strpos($f, '.') === 0) {
		continue;
	}
	// also ignore the index.php file that is used to generate the code
	else if($f == 'index.php' || $f == 'dindex.php') {
		continue;
	}
	// see if the file is a directory
	else if(is_dir($f)) {
		$dirs[] = $f;
	}
	// see if the file is an image
	else if(in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), array('jpg','gif'))) {
		$images[] = array( 'path' => $f, 'thumb' => $f );
	}
	// the file falls under "extra"
	else {
		$extras[] = $f;
	}
}

// decide if to show normal or reverse order (by default it's reverse)
$defaultReverse = 1;
$reverse = (isset($_GET['reverse']) ? $_GET['reverse'] : $defaultReverse);
if($reverse == 1) {
	$images = array_reverse($images);
}
?>

<?php
// show a list of the child directories that exist
if(count($dirs) > 0) {
?>
	<div id="next_dirs">
		<?php
		foreach($dirs as $dir) { ?>
			<a class="folderbox" href="<?php echo $dir;?>">
				<img src="<?php echo IMAGES_DIR;?>foldericon.png" />
				<div><?php echo $dir;?></div>
			</a>
		<?php
		}
		?>
		<div style="clear:both"></div>
	</div>
<?php } ?>

<div style="clear:both;"></div>

<?php
// all the image showing stuff

// first decide how many pictures to show on a page
$defaultNumPics = 50;
$numToShow = (isset($_GET['numpics']) ? $_GET['numpics'] : $defaultNumPics);
$possibleNumPics = array(10,50,100,500);
if(!in_array($numToShow, $possibleNumPics)) {
    $possibleNumPics[] = $numToShow;
}

// decide what page numbers to show
$defaultPage = 1;
$pageNum = (isset($_GET['pagenum']) ? $_GET['pagenum'] : $defaultPage);
$maxPage = ceil(count($images) / $numToShow);
$possiblePages = range(1, $maxPage);

// decide what size the thumbnails should be shown
$defaultThumbnailSize = 150;
$thumbSize = (isset($_GET['thumbsize']) ? $_GET['thumbsize'] : $defaultThumbnailSize);
$possibleThumbSizes = array(50, 100, 150, 200, 250, 300, 400, 500);
if(!in_array($thumbSize, $possibleThumbSizes)) {
        $possibleThumbSizes[] = $thumbSize;
}

// from the long list of images that are in this directory, only fetch the images that will be shown on this page
$totalNumPics = count($images);
$images = array_slice($images, ($pageNum - 1)*$numToShow, $numToShow);

// determine what pagination links are necessary
$prevLink = ($pageNum > 1);
$nextLink = ($pageNum < $maxPage);
$pagesLinks = ($maxPage > 1);

// ------------ optimization so browser doesn't take an hour downloading lots of large photos ----
// look for a compressed version of the image in a subfolder. You can use any image compression program such as
// FILEminimizer to create the smaller images. If an optimized file is found for an image, then we display that
// image instead (but the link to download or view the full image points to the original). Currently, the script
// searches for the compressed image at ".cimages/(opt) <image name>"
clearstatcache();
$compressedPicsDir = '.cimages';
if(file_exists($compressedPicsDir) && is_dir($compressedPicsDir)){
	// go through all the images we intend to show, and see if its thumbnail already exists. If it doesn't, then create it
	// we use these thumbnails to show on the page, but clicking on a picture brings us to the original full quality version
	$compressedImgPrefix = '(opt) ';
	foreach($images as &$imageData){
		$imageName = $imageData['path'];
		$compressedImageName = $compressedPicsDir . '/' . $compressedImgPrefix . $imageName;
		if( file_exists($compressedImageName) ){
			$imageData['thumb'] = $compressedImageName;
		}
	}
	unset($imageData); // since we passed by reference, we want to destroy this variable
}
// ------------ end of optimization
?>

<?php
// show the images
if(count($images) > 0) {
?>
	<div id="images">
		<div class="image_filters">
			<?php if($prevLink) { ?>
				<a style="margin-right:10px;" href="./?numpics=<?php echo $numToShow; ?>&pagenum=<?php echo $pageNum-1; ?>&thumbsize=<?php echo $thumbSize; ?>&reverse=<?php echo $reverse; ?>">< Previous</a>
			<?php } ?>
			<?php if($nextLink) { ?>
				<a style="margin-right:10px;" href="./?numpics=<?php echo $numToShow; ?>&pagenum=<?php echo $pageNum+1; ?>&thumbsize=<?php echo $thumbSize; ?>&reverse=<?php echo $reverse; ?>">Next ></a>
			<?php } ?>
		
			<?php if($pagesLinks) { ?>
				<select onchange="var pageNum = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow?> + '&pagenum=' + pageNum + '&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + <?php echo $reverse; ?>;">
					<?php
					foreach($possiblePages as $page) {
					?>
						<option value="<?php echo $page;?>" <?php if($pageNum == $page) { echo 'selected'; } ?>>Page <?php echo $page;?></option>
					<?php } ?>
				</select>
			<?php } ?>
			
			<select onchange="var numToShow = this.value; window.location = window.location.pathname + '?numpics=' + numToShow + '&pagenum=1&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + <?php echo $reverse; ?>;">
				<?php 
				foreach($possibleNumPics as $num) {
				?>
					<option value="<?php echo $num;?>" <?php if($numToShow == $num) { echo 'selected'; } ?>>Show <?php echo $num;?> per page</option>
				<?php } ?>
			</select> 

			<select onchange="var thumbSize = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow; ?> + '&pagenum=' + <?php echo $pageNum; ?> + '&thumbsize=' + thumbSize + '&reverse=' + <?php echo $reverse; ?>;">
				<?php
				foreach($possibleThumbSizes as $size) {
				?>
					<option value="<?php echo $size;?>" <?php if($thumbSize ==  $size) { echo 'selected'; } ?>>Size: <?php echo $size;?></option>
				<?php } ?>
			</select>

			<select onchange="var reverse = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow; ?> + '&pagenum=' + <?php echo $pageNum; ?> + '&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + reverse">
				<option value="0" <?php if($reverse ==  '0') { echo 'selected'; } ?>>Order: A-Z</option>
				<option value="1" <?php if($reverse ==  '1') { echo 'selected'; } ?>>Order: Z-A</option>
			</select>
			
			<span><?php echo $totalNumPics;?> pictures</span>
		</div>
		
		<div>
			<?php
			foreach($images as $imageData) { ?>
				<a target="_blank" href="<?php echo $imageData['path'];?>" title="<?php echo $imageData['path']; ?>" style="float:left;margin:0 8px 5px 0;">
					<img style="min-width:30px;min-height:30px;max-width:<?php echo $thumbSize;?>px;max-height:<?php echo $thumbSize;?>px;border:1px solid #555;" src="<?php echo $imageData['thumb']; ?>" />
				</a>
			<?php 
			}
			?>
			<div style="clear:both;"></div>
		</div>
		
		<div class="image_filters">
			<?php if($prevLink) { ?>
				<a style="margin-right:10px;" href="./?numpics=<?php echo $numToShow; ?>&pagenum=<?php echo $pageNum-1; ?>&thumbsize=<?php echo $thumbSize; ?>&reverse=<?php echo $reverse; ?>">< Previous</a>
			<?php } ?>
			<?php if($nextLink) { ?>
				<a style="margin-right:10px;" href="./?numpics=<?php echo $numToShow; ?>&pagenum=<?php echo $pageNum+1; ?>&thumbsize=<?php echo $thumbSize; ?>&reverse=<?php echo $reverse; ?>">Next ></a>
			<?php } ?>
		
			<?php if($pagesLinks) { ?>
				<select onchange="var pageNum = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow?> + '&pagenum=' + pageNum + '&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + <?php echo $reverse; ?>;">
					<?php
					foreach($possiblePages as $page) {
					?>
						<option value="<?php echo $page;?>" <?php if($pageNum == $page) { echo 'selected'; } ?>>Page <?php echo $page;?></option>
					<?php } ?>
				</select>
			<?php } ?>
			
			<select onchange="var numToShow = this.value; window.location = window.location.pathname + '?numpics=' + numToShow + '&pagenum=1&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + <?php echo $reverse; ?>;">
				<?php 
				foreach($possibleNumPics as $num) {
				?>
					<option value="<?php echo $num;?>" <?php if($numToShow == $num) { echo 'selected'; } ?>>Show <?php echo $num;?> per page</option>
				<?php } ?>
			</select> 

			<select onchange="var thumbSize = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow; ?> + '&pagenum=' + <?php echo $pageNum; ?> + '&thumbsize=' + thumbSize + '&reverse=' + <?php echo $reverse; ?>;">
				<?php
				foreach($possibleThumbSizes as $size) {
				?>
					<option value="<?php echo $size;?>" <?php if($thumbSize ==  $size) { echo 'selected'; } ?>>Size: <?php echo $size;?></option>
				<?php } ?>
			</select>

			<select onchange="var reverse = this.value; window.location = window.location.pathname + '?numpics=' + <?php echo $numToShow; ?> + '&pagenum=' + <?php echo $pageNum; ?> + '&thumbsize=' + <?php echo $thumbSize; ?> + '&reverse=' + reverse">
				<option value="0" <?php if($reverse ==  '0') { echo 'selected'; } ?>>Order: A-Z</option>
				<option value="1" <?php if($reverse ==  '1') { echo 'selected'; } ?>>Order: Z-A</option>
			</select>
			
			<span><?php echo $totalNumPics;?> pictures</span>
		</div>		
	</div>
	<div style="clear:both;"></div>
<?php } ?>

<?php
// show the extra (video/text/misc) files
if(count($extras) > 0) {
?>
	<div id="extras">
		<?php
		foreach($extras as $extra) { ?>
			<div>
				<a href="<?php echo $extra;?>">
					<div><?php echo $extra;?>
				</a>
			</div>
		<?php
		}
		?>
	</div>
<?php } ?>
	
</body>
</html>
