<?php
declare(strict_types=1);

namespace EasyAdmin\upload\driver\bdoss;

use BaiduBce\Services\Bos\BosOptions;
use EasyAdmin\upload\interfaces\OssDriver;
use OSS\Core\MimeTypes;
use OSS\Core\OssException;

include 'BaiduBce.phar';

class Bos implements OssDriver
{
    static private $instance;

    /**
     * @var \BaiduBce\Services\Bos\BosClient
     */
    private $client;
    private $bucket;
    private $domain;

    protected function __construct($config)
    {
        $config = [
            'config' => [
                'credentials' => [
                    'accessKeyId' => $config['bos_access_key'],
                    'secretAccessKey' => $config['bos_secret_key']
                ],
                'endpoint' => $config['bos_endpoint'] ?? 'http://bj.bcebos.com',
            ],
            'bucket' => $config['bos_bucket'],
            'domain' => $config['bos_domain']
        ];
        $this->client = new \BaiduBce\Services\Bos\BosClient($config['config']);
        $this->bucket = $config['bucket'];
        $this->domain = $config['domain'];
        return $this;
    }

    public static function instance($config)
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($config);
        }
        return self::$instance;
    }

    public function save($objectName, $filePath)
    {
        $objectName = str_replace("\\", "/", $objectName);
        try {
            $upload = $this->client->putObjectFromFile($this->bucket, $objectName, $filePath, [
                BosOptions::CONTENT_TYPE => MimeTypes::getMimetype($filePath)
            ]);
        } catch (\Exception $e) {
            return [
                'save' => false,
                'msg' => $e->getMessage(),
            ];
        }
        return [
            'save' => true,
            'msg' => '上传成功',
            'url' => "{$this->domain}/{$objectName}",
        ];
    }
}