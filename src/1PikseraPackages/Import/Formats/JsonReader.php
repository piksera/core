<?php
namespace PikseraPackages\Import\Formats;

$dir = __DIR__;
$dir = str_replace('Import\Formats', '', $dir);
$dir = str_replace('Import/Formats', '', $dir);

use PikseraPackages\Backup\EncodingFix;

class JsonReader extends DefaultReader
{

	public function readData()
	{
		$readyJson = array();

//        $items = [];
//        $parser = new \JsonCollectionParser\Parser();
//        $parser->parse($this->file, function (array $item) use (&$items) {
//            $items = $item;
//
//        },true);
//

        $readyJson = json_decode(file_get_contents($this->file), true);

		if (isset($readyJson[0]['id'])) {
		   return EncodingFix::decode(array("content"=>$readyJson));
        }

		return EncodingFix::decode($readyJson);
	}
}
