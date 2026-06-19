<?php

/**
 * Site meta information provider.
 * Provides structured metadata for demonstration purposes.
 */
class SiteMeta
{
    private array $siteInfo;

    public function __construct()
    {
        $this->siteInfo = [
            'url'         => 'https://cnzh-leyusports.com.cn',
            'name'        => '乐鱼体育',
            'description' => '专业的体育赛事资讯平台，提供全面的体育新闻与数据分析。',
            'keywords'    => ['乐鱼体育', '体育资讯', '赛事数据', '运动新闻'],
            'language'    => 'zh-CN',
            'author'      => '乐鱼体育团队',
        ];
    }

    /**
     * Return the site URL.
     */
    public function getUrl(): string
    {
        return $this->siteInfo['url'];
    }

    /**
     * Return the site name.
     */
    public function getName(): string
    {
        return $this->siteInfo['name'];
    }

    /**
     * Return full description text.
     */
    public function getDescription(): string
    {
        return $this->siteInfo['description'];
    }

    /**
     * Return the array of keywords.
     */
    public function getKeywords(): array
    {
        return $this->siteInfo['keywords'];
    }

    /**
     * Generate a short summary text (<= 120 chars) for SEO or snippet usage.
     *
     * @return string
     */
    public function generateShortDescription(): string
    {
        $parts = [
            $this->siteInfo['name'],
            '——',
            $this->siteInfo['description'],
        ];

        $text = implode('', $parts);

        if (mb_strlen($text) > 120) {
            $text = mb_substr($text, 0, 117) . '...';
        }

        return $text;
    }

    /**
     * Generate a string containing key site info.
     *
     * @return string
     */
    public function toMetaString(): string
    {
        $escapedName = htmlspecialchars($this->siteInfo['name'], ENT_QUOTES, 'UTF-8');
        $escapedDesc = htmlspecialchars($this->siteInfo['description'], ENT_QUOTES, 'UTF-8');

        return sprintf(
            '%s | %s | %s',
            $escapedName,
            $this->siteInfo['url'],
            $escapedDesc
        );
    }
}

// --- Demonstration ---

$meta = new SiteMeta();

echo 'URL: ' . $meta->getUrl() . PHP_EOL;
echo 'Name: ' . $meta->getName() . PHP_EOL;
echo 'Description: ' . $meta->getDescription() . PHP_EOL;
echo 'Short description: ' . $meta->generateShortDescription() . PHP_EOL;
echo 'Meta string: ' . $meta->toMetaString() . PHP_EOL;
echo 'Keywords: ' . implode(', ', $meta->getKeywords()) . PHP_EOL;