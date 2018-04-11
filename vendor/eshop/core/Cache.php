<?php

namespace eshop;


class Cache {

    use TSingle;

    public function set($key, $data, $seconds = 3600): bool {
        if($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if(file_put_contents(CACHE . '/' . md5($key), serialize($content))) {
                return true;
            }
        }
        return false;
    }

    public function get($key) {
        $file = CACHE . '/' . md5($key);
        if(file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']) {
                return $content;
            }
            unlink($file); // cache is old; remove it
        }
        return false;
    }

    public function delete($key) {
        $file = CACHE . '/' . md5($key);
        if(file_exists($file)) {
            unlink($file);
        }
    }

}