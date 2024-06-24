<?php

class TaggableFileCacheServiceProviderTest extends \PikseraPackages\Core\tests\TestCase
{
	public function testCacheIsTaggableFileCacheWhenUsing(){

		$this->assertInstanceOf(\PikseraPackages\Cache\TaggableFileStore::class, app('cache')->store()->getStore());
	}

}
