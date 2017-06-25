<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/11
 * Time: 13:21
 */

namespace Netease\fm;
class Netease
{
    /**
     * @var string
     */
    private $refer = 'http://music.163.com';

    /**
     * @param $url
     * @param array $data
     * @return array|mixed|object
     */
    private function http($url, $data = [])
    {
        $header = [
            'Host: music.163.com',
            'Origin: http://music.163.com',
            sprintf('Referer %s', $this->refer.(strpos($url, 'search') ? 'search/' : '')),
            sprintf('User-Agent: %s', strpos($url, 'm/song') ? 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7' : 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36'),
            !empty($data) ? 'Content-Type: application/x-www-form-urlencoded' : 'Cookie: appver=1.5.0.75771;'
        ];
        $ch = curl_init();
        $url = strpos($url, '?') ? $url.'&_='.time() : $url.'?_='.time();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        // curl_setopt($ch, CURLOPT_REFERER, $this->refer);
        if(!empty($data)){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }

    /**
     * @param $playlist_id
     * @return array|mixed|object
     */
    public function get_playlist_info($playlist_id)
    {
        return $this->http(sprintf('http://music.163.com/api/playlist/detail?id=%u', $playlist_id));
    }

    /**
     * @param $music_id
     * @return array|mixed|object
     */
    public function get_music_info($music_id)
    {
        return $this->http(sprintf('http://music.163.com/api/song/detail/?id=%u&ids=%%5B%u%%5D', $music_id, $music_id));
    }

    /**
     * @param $music_id
     * @return array|mixed|object
     */
    public function get_music_lryic($music_id)
    {
        return $this->http(sprintf('http://music.163.com/api/song/lyric?os=pc&id=%u&lv=-1&kv=-1&tv=-1', $music_id));
    }

    /**
     * @param $artist_id
     * @param $limit
     * @return array|mixed|object
     */
    public function get_artist_album($artist_id, $limit)
    {
        return $this->http(sprintf('http://music.163.com/api/artist/albums/%u?limit=%u', $artist_id, $limit));
    }

    /**
     * @param $album_id
     * @return array|mixed|object
     */
    public function get_album_info($album_id)
    {
        return $this->http(sprintf('http://music.163.com/api/album/%u', $album_id));
    }

    /**
     * @param $mvid
     * @param string $type
     * @return array|mixed|object
     */
    public function get_mv_info($mvid, $type = 'mp4')
    {
        return $this->http(sprintf('http://music.163.com/api/mv/detail?id=%u&type=%u', $mvid, $type));
    }

    /**
     * @param $artists
     * @return string
     */
    public function artists($artists){
        $name = '';
        foreach($artists as $k => $v){
            $name .= $v['name'].',';
        }
        return rtrim($name, ',');
    }

    /**
     * @param $word
     * @param int $offset
     * @param int $limit
     * @param int $type
     * @return array|mixed|object
     */
    public function search($word, $offset = 0, $limit = 30, $type = 1){
        $url = 'http://music.163.com/api/search/pc';
        // $url = 'http://music.163.com/api/search/get/web';
        // $url = 'http://music.163.com/api/search/suggest/web';
        $data = array(
            's' => $word,
            'offset' => $offset,
            'limit' => $limit,
            'type' => $type
        );
        return $this->http($url, $data);
    }
}