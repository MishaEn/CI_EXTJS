<?php
    function parse_format($format){
        switch($format){
            case 'pdf':
                $file = 'file-pdf';
                break;
            case 'txt':
                $file = 'file-alt';
                break;
            case 'flac':
                $file = 'file-audio';
                break;
            case 'mp1':
                $file = 'file-audio';
                break;
            case 'mp2':
                $file = 'file-audio';
                break;
            case 'mp3':
                $file = 'file-audio';
                break;
            case 'wav':
                $file = 'file-audio';
                break;
            case 'wma':
                $file = 'file-audio';
                break;
            case '7-zip':
                $file = 'file-archive';
                break;
            case '7z':
                $file = 'file-archive';
                break;
            case 'apk':
                $file = 'file-archive';
                break;
            case 'aplib':
                $file = 'file-archive';
                break;
            case 'adi':
                $file = 'file-archive';
                break;
            case 'ar':
                $file = 'file-archive';
                break;
            case 'arc':
                $file = 'file-archive';
                break;
            case 'arj':
                $file = 'file-archive';
                break;
            case 'ark':
                $file = 'file-archive';
                break;
            case 'brieflz':
                $file = 'file-archive';
                break;
            case 'bzip2':
                $file = 'file-archive';
                break;
            case 'cabinet':
                $file = 'file-archive';
                break;
            case 'cpio':
                $file = 'file-archive';
                break;
            case 'dar':
                $file = 'file-archive';
                break;
            case 'deb':
                $file = 'file-archive';
                break;
            case 'ear':
                $file = 'file-archive';
                break;
            case 'freearc':
                $file = 'file-archive';
                break;
            case 'ghost':
                $file = 'file-archive';
                break;
            case 'gzip':
                $file = 'file-archive';
                break;
            case 'iso':
                $file = 'file-archive';
                break;
            case 'jar':
                $file = 'file-archive';
                break;
            case 'lha':
                $file = 'file-archive';
                break;
            case 'lzip':
                $file = 'file-archive';
                break;
            case 'lzma':
                $file = 'file-archive';
                break;
            case 'lzop':
                $file = 'file-archive';
                break;
            case 'mdf':
                $file = 'file-archive';
                break;
            case 'mhtml':
                $file = 'file-archive';
                break;
            case 'pax':
                $file = 'file-archive';
                break;
            case 'qcow2':
                $file = 'file-archive';
                break;
            case 'rar':
                $file = 'file-archive';
                break;
            case 'rpm':
                $file = 'file-archive';
                break;
            case 'scorm':
                $file = 'file-archive';
                break;
            case 'snappy':
                $file = 'file-archive';
                break;
            case 'sqx':
                $file = 'file-archive';
                break;
            case 'tar':
                $file = 'file-archive';
                break;
            case 'war':
                $file = 'file-archive';
                break;
            case 'winprs':
                $file = 'file-archive';
                break;
            case 'xar':
                $file = 'file-archive';
                break;
            case 'zip':
                $file = 'file-archive';
                break;
            case 'zoo':
                $file = 'file-archive';
                break;
            case 'xlsx':
                $file = 'file-excel';
                break;
            case 'xlsm':
                $file = 'file-excel';
                break;
            case 'xlsb':
                $file = 'file-excel';
                break;
            case 'xltx':
                $file = 'file-excel';
                break;
            case 'xltm':
                $file = 'file-excel';
                break;
            case 'xls':
                $file = 'file-excel';
                break;
            case 'xlt':
                $file = 'file-excel';
                break;
            case 'xml':
                $file = 'file-excel';
                break;
            case 'xlam':
                $file = 'file-excel';
                break;
            case 'xla':
                $file = 'file-excel';
                break;
            case 'xlw':
                $file = 'file-excel';
                break;
            case 'bmp':
                $file = 'file-image';
                break;
            case 'ecw':
                $file = 'file-image';
                break;
            case 'gif':
                $file = 'file-image';
                break;
            case 'ico':
                $file = 'file-image';
                break;
            case 'ilbm':
                $file = 'file-image';
                break;
            case 'jpeg':
                $file = 'file-image';
                break;
            case 'jpeg 2000':
                $file = 'file-image';
                break;
            case 'vil':
                $file = 'file-image';
                break;
            case 'mrsid':
                $file = 'file-image';
                break;
            case 'pcx':
                $file = 'file-image';
                break;
            case 'png':
                $file = 'file-image';
                break;
            case 'psd':
                $file = 'file-image';
                break;
            case 'tga':
                $file = 'file-image';
                break;
            case 'tiff':
                $file = 'file-image';
                break;
            case 'hd photo':
                $file = 'file-image';
                break;
            case 'webp':
                $file = 'file-image';
                break;
            case 'xbm':
                $file = 'file-image';
                break;
            case 'rla':
                $file = 'file-image';
                break;
            case 'rpf':
                $file = 'file-image';
                break;
            case 'pnm':
                $file = 'file-image';
                break;
            case 'pptx':
                $file = 'file-powerpoint';
                break;
            case 'pptm':
                $file = 'file-powerpoint';
                break;
            case 'ppt':
                $file = 'file-powerpoint';
                break;
            case 'xps':
                $file = 'file-powerpoint';
                break;
            case 'potx':
                $file = 'file-powerpoint';
                break;
            case 'potm':
                $file = 'file-powerpoint';
                break;
            case 'pot':
                $file = 'file-powerpoint';
                break;
            case 'thmx':
                $file = 'file-powerpoint';
                break;
            case 'ppsx':
                $file = 'file-powerpoint';
                break;
            case 'ppsm':
                $file = 'file-powerpoint';
                break;
            case 'pps':
                $file = 'file-powerpoint';
                break;
            case 'ppam':
                $file = 'file-powerpoint';
                break;
            case 'ppa':
                $file = 'file-powerpoint';
                break;
            case '264':
                $file = 'file-video';
                break;
            case '3g2':
                $file = 'file-video';
                break;
            case '3gp':
                $file = 'file-video';
                break;
            case '3gpp':
                $file = 'file-video';
                break;
            case 'aep':
                $file = 'file-video';
                break;
            case 'amv':
                $file = 'file-video';
                break;
            case 'arf':
                $file = 'file-video';
                break;
            case 'asf':
                $file = 'file-video';
                break;
            case 'avi':
                $file = 'file-video';
                break;
            case 'bik':
                $file = 'file-video';
                break;
            case 'ced':
                $file = 'file-video';
                break;
            case 'cpi':
                $file = 'file-video';
                break;
            case 'dav':
                $file = 'file-video';
                break;
            case 'dir':
                $file = 'file-video';
                break;
            case 'divx':
                $file = 'file-video';
                break;
            case 'dvsd':
                $file = 'file-video';
                break;
            case 'esp3':
                $file = 'file-video';
                break;
            case 'f4v':
                $file = 'file-video';
                break;
            case 'flv':
                $file = 'file-video';
                break;
            case 'h264':
                $file = 'file-video';
                break;
            case 'ifo':
                $file = 'file-video';
                break;
            case 'm2ts':
                $file = 'file-video';
                break;
            case 'm4v':
                $file = 'file-video';
                break;
            case 'mepx':
                $file = 'file-video';
                break;
            case 'mkv':
                $file = 'file-video';
                break;
            case 'mod':
                $file = 'file-video';
                break;
            case 'mov':
                $file = 'file-video';
                break;
            case 'mp4':
                $file = 'file-video';
                break;
            case 'mpg':
                $file = 'file-video';
                break;
            case 'mswmm':
                $file = 'file-video';
                break;
            case 'mxf':
                $file = 'file-video';
                break;
            case 'nfv':
                $file = 'file-video';
                break;
            case 'ogv':
                $file = 'file-video';
                break;
            case 'pds':
                $file = 'file-video';
                break;
            case 'qt':
                $file = 'file-video';
                break;
            case 'rcproject':
                $file = 'file-video';
                break;
            case 'rm':
                $file = 'file-video';
                break;
            case 'rmvb':
                $file = 'file-video';
                break;
            case 'srt':
                $file = 'file-video';
                break;
            case 'swf':
                $file = 'file-video';
                break;
            case 'thp':
                $file = 'file-video';
                break;
            case 'mpeg':
                $file = 'file-video';
                break;
            case 'tvs':
                $file = 'file-video';
                break;
            case 'veg':
                $file = 'file-video';
                break;
            case 'vep':
                $file = 'file-video';
                break;
            case 'vob':
                $file = 'file-video';
                break;
            case 'vpj':
                $file = 'file-video';
                break;
            case 'vproj':
                $file = 'file-video';
                break;
            case 'vsdc':
                $file = 'file-video';
                break;
            case 'webm':
                $file = 'file-video';
                break;
            case 'wlmp':
                $file = 'file-video';
                break;
            case 'wmv':
                $file = 'file-video';
                break;
            case 'xesc':
                $file = 'file-video';
                break;
            case 'docx':
                $file = 'file-word';
                break;
            case 'doc':
                $file = 'file-word';
                break;
            case 'dotx':
                $file = 'file-word';
                break;
            case 'dot':
                $file = 'file-word';
                break;
            case 'docm':
                $file = 'file-word';
                break;
            case 'dotm':
                $file = 'file-word';
                break;
            case 'mht':
                $file = 'file-word';
                break;
            case 'htm':
                $file = 'file-word';
                break;
            case 'rtf':
                $file = 'file-word';
                break;
            case 'odt':
                $file = 'file-word';
                break;
            case '':
                $file = 'folder';
                break;
            default:
                $file = 'file';
                break;

        }
        switch ($file){
            case 'file-word':
                $color = '#007bff';
                break;
            case 'file-video':
                $color = '#3d9970';
                break;
            case 'file-powerpoint':
                $color = '#fd7e14';
                break;
            case 'file-pdf':
                $color = '#dc3545';
                break;
            case 'file-image':
                $color = '#ffc107';
                break;
            case 'file-excel':
                $color = '#28a745';
                break;
            case 'file-code':
                $color = '#6f42c1';
                break;
            case 'file-audio':
                $color = '#001f3f';
                break;
            case 'file-archive':
                $color = '#6c757d';
                break;
            case 'file-alt':
                $color = '#6c757d';
                break;
            case 'file':
                $color = '#343a40';
                break;
            case 'folder':
                $color = '#dc3545';
                break;
            default:
                $color = '#343a40';
                break;
        }
        return ['format' => $file, 'color' => $color];
    }



























