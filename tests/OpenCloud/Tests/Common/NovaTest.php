<?php

/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Tests\Common;

use OpenCloud\Common\Service\NovaService;

class MyNova extends NovaService {}

class NovaTest extends \OpenCloud\Tests\OpenCloudTestCase
{
    private $nova;

    public function __construct()
    {
        $this->nova = new MyNova(
            $this->getClient(), 'compute', 'cloudServersOpenStack', 'DFW', 'publicURL'
        );
    }

    /**
     * Tests
     */
    public function testUrl()
    {
        $this->assertEquals(
            'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/foo', 
            $this->nova->Url('foo')
        );
    }

    public function testFlavor()
    {
        $this->assertInstanceOf('OpenCloud\Compute\Resource\Flavor', $this->nova->flavor());
    }

    public function testFlavorList()
    {
        $this->assertInstanceOf('OpenCloud\Common\Collection', $this->nova->flavorList());
    }

}
