<?php
function handleQdResponse($data, $encode = true, $encrypt = true)
{
    if ($encrypt) {
        if ($encode) {
            $toSend = json_encode($data);
        } else {
            $toSend = $data;
        }
        $response = ['status' => true, 'encrypted' => true, 'data' => qdEncrypt($toSend), 'message' => 'OK'];
        echo json_encode($response);
        exit;
    } else {
        $response = ['status' => true, 'data' => $data, 'message' => 'OK'];
        echo json_encode($response);
        exit;
    }
}
ini_set('memory_limit', -1);
include("../includes/functions.php");
error_reporting(0);
ini_set('display_errors', 0);
$key = "YwSUrhDEZQMOBdybgCFLCxAesprrOBBq";
$iv = "3455502825992902";
$bearer = getBearerToken();
if ($bearer) {
    parse_str(base64_decode($bearer), $inParams);
    $appId = qdDecrypt($inParams['username']);
    $username = qdDecrypt($inParams['username']);
    $password = qdDecrypt($inParams['password']);
    $portal = qdDecrypt($inParams['service']);
}

$urlParts = explode('/', $_GET['path']);
switch ($urlParts[0]) {
    case "app-configs":
        $appId = $_GET['app_id'];
        $row = loadLTQDOptions();
        handleQdResponse($row);
        break;
    case "auth":
        $appId = qdDecrypt($_POST['app_id']);
        $username = qdDecrypt($_POST['username']);
        $password = qdDecrypt($_POST['password']);
        $dnsInfo = loadAllDNS(true);
        foreach ($dnsInfo as $thisDns) {
            $response = callApi($thisDns['portal'] . '/player_api.php?username=' . $username . '&password=' . $password);
            $data = json_decode($response['data'], true);
            if ($data) {
                if (isset($data['user_info']['auth'])) {
                    if ($data['user_info']['auth'] != 0) {
                        if ($data['user_info']['status'] == 'Active') {
                            $token = base64_encode($rawData . '&service=' . urlencode(qdEncrypt($thisDns['portal'])));
                            $userInfo = $data['user_info'];
                            $serverinfo = $data['server_info'];
                            $returnable = ['access_token' => $token, 'token_type' => 'Bearer', 'expires_at' => '2050-01-01 00:00:00', 'status' => true, 'user' => $userInfo, 'server' => $serverinfo];
                            handleQdResponse($returnable);
                        }
                    }
                }
            }
        }
        break;
    case "stream-categories":
        $type = $_GET['type'];
        if ($type == 'movie') {
            $action = 'get_vod_categories';
        }
        if ($type == 'series') {
            $action = 'get_series_categories';
        }
        if ($type == 'live') {
            $action = 'get_live_categories';
        }
        $url = $portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=' . $action . '';
        $response = callApi($url);
        $data = json_decode($response['data'], true);

        $transformed = array_map(function ($obj, $index) use ($type) {
            return ['id' => $obj['category_id'], 'category_type' => $type, 'category_name' => $obj['category_name'], 'parent_id' => $obj['parent_id'], 'cat_order' => $index + 1];
        }, $data, array_keys($data));
        handleQdResponse($transformed);
        break;
    case "profile":
        $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password);
        $data = json_decode($response['data'], true);
        $user = $data['user_info'];
        $server = $data['server_info'];
        $result = ['user' => $user, 'server' => $server];
        handleQdResponse($result);
        break;
    case "movies":
        $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=get_vod_info&vod_id=' . $urlParts[2]);
        $data = json_decode($response['data'], true);
        handleQdResponse($data);
        break;
    case "catalogues";
        $appId = $_GET['app_id'];
        $catalogues = [];
        $allApps = loadLTQDAppstore();
        foreach ($allApps as $row) {
            $data = ['id' => $row['id'], 'name' => $row['name'], 'package_name' => $row['package_name'], 'install_url' => $row['install_url'], 'description' => $row['description'], 'banner' => $row['banner'], 'created_at' => $row['created_at'], 'updated_at' => $row['updated_at'], 'app_id' => $row['app_id']];
            array_push($catalogues, $data);
        }
        handleQdResponse($catalogues);
        break;
    case "players":
        handleQdResponse([]);
        break;
    case 'series':
        switch ($urlParts[1]) {
            case 'info';
                $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=get_series_info&series_id=' . $urlParts[2]);
                $data = $response['data'];
                $decoded = json_decode($data, true);

                if (count($decoded['seasons'])) {
                    $decoded['info']['seasons_count'] = count($decoded['seasons']);
                } else {
                    $decoded['info']['seasons_count'] = 1;
                }
                $nxt = true;
                if ($nxt) {
                    $decoded['info']['seasons_count'] = count($decoded['episodes']);
                }
                handleQdResponse($decoded['info']);
                exit;
                break;
            case "seasons":
                $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=get_series_info&series_id=' . $urlParts[2]);
                $data = $response['data'];
                $decoded = json_decode($data, true);
                if (count($decoded['seasons']) && isset($decoded['seasons'][0]['id'])) {
                    $seasons = json_encode($decoded['seasons']);
                    $seasons = preg_replace('/"episode_run_time":""/', '"episode_run_time":"1"', $seasons);
                    $seasons = preg_replace('/"id":""/', '"id":"1"', $seasons);
                    $seasons = json_decode($seasons);
                } else {
                    $seasons = array();
                    foreach ($decoded['episodes'] as $arrayKey => $value) {
                        $episodeCount = count($value);
                        if ($episodeCount > 0) {
                            $releasedate = $value[0]['info']['release_date'];
                            $coverUrl = $decoded['info']['cover'];
                        }
                        $releasedate = '2021-01-01';
                        $dummySeason = '{
                        "id": ' . $arrayKey . ',
                        "name": "Season ' . $arrayKey . '",
                        "episode_count": "' . $episodeCount . '",
                        "overview": "' . $coverUrl . '",
                        "air_date": "' . $releasedate . '",
                        "cover": "' . $coverUrl . '",
                        "season_number": ' . $arrayKey . ',
                        "cover_big": "' . $coverUrl . '"}';
                        $seasons[] = json_decode($dummySeason);
                    }
                }
                handleQdResponse($seasons);
                break;
            case "episodes":
                $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=get_series_info&series_id=' . $urlParts[2]);
                $data = json_decode($response['data'], true);
                $season = false;
                foreach ($data['seasons'] as $s) {
                    if ($s['id'] == $urlParts[3]) {
                        $season = $s;
                        break;
                    }
                }
                $episodeList = array();
                foreach ($data['episodes'] as $allEpisodes) {
                    foreach ($allEpisodes as $episode) {
                        if ($season['season_number'] == $episode['season'] || $episode['season'] == $urlParts[3]) {
                            $episodeList[] = $episode;
                        }
                    }
                }
                $response = [
                    'season'       => $season,
                    'episodes'     => $episodeList,
                    'userWatching' => []
                ];
                handleQdResponse($response);
                break;
        }
        break;
    case "xmltv":
        $response = callApi($portal . '/xmltv.php?username=' . $username . '&password=' . $password);
        echo  $response['data'];
        exit;
        break;
    case "streams":
        if (!isset($urlParts[1])) {
            $type = $_GET['type'];
            if ($type == 'live') {
                $action = 'get_live_streams';
            }

            if ($type == 'movie') {
                $action = 'get_vod_streams';
            }

            if ($type == 'series') {
                $action = 'get_series';
            }
            $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=' . $action . '');
            $data = json_decode($response['data'], true);
            handleQdResponse($data);
        } else if ($urlParts[1] == "catchups") {
            $response = callApi($portal . '/player_api.php?username=' . $username . '&password=' . $password . '&action=get_simple_data_table&stream_id=' . $urlParts[2]);
            $data = json_decode($response['data'], true);
            $dates = [];
            foreach ($data['epg_listings'] as $epg) {
                if (preg_match('/^[a-zA-Z0-9\\/\\r\\n+]*={0,2}$/', $epg['title'])) {
                    $epg['title'] = base64_decode($epg['title']);
                }
                if (preg_match('/^[a-zA-Z0-9\\/\\r\\n+]*={0,2}$/', $epg['description'])) {
                    $epg['description'] = base64_decode($epg['description']);
                }
                $date_string = $epg['start'];
                $date_object = new DateTime($date_string);
                $formatted_date = $date_object->format('Ymd');

                if (!isset($dates[$formatted_date])) {
                    $dates[$formatted_date] = [];
                }

                array_push($dates[$formatted_date], $epg);
            }
            handleQdResponse($dates);
        }
        break;
    case "themes":

        $data = [];
        $allThemes = loadLTQDThemes();
        foreach ($allThemes as $row) {
            array_push($data, ['id' => $row['id'], 'name' => $row['name'], 'preview_image' => $row['preview_image'], 'created_at' => $row['created_at'], 'updated_at' => $row['updated_at'], 'download_url' => $row['download_url']]);
        }
        handleQdResponse($data, false, false);
        break;
    case "sections":
        if ($urlParts[1]) {

            $allSectionItems = loadLTQDSectionItems($urlParts[1]);
            $data = [];
            foreach ($allSectionItems as $row) {
                array_push($data, $row);
            }
            handleQdResponse($data);
        } else {
            $allSections = loadLTQDSections();
            $data = [];
            foreach ($allSections as $row) {
                array_push($data, ['id' => $row['id'], 'title' => $row['title'], 'enabled' => $row['enabled'], 'predefined' => $row['predefined'], 'reference' => $row['reference']]);
            }
            handleQdResponse($data);
        }
        break;
    case "event-categories":
        if ($urlParts[1] == "schedule-dates") {
            $allSportsEvents = loadLTQDSportsEvents($urlParts[2]);
            $data = [];

            foreach ($allSportsEvents as $row) {
                $datetime = new DateTime($row['start_timestamp']);
                $datetime->setTimezone(new DateTimeZone('UTC'));
                array_push($data, $datetime->format('Y-m-d H:i:s'));
            }
            $data = array_unique($data);
            $response = ['status' => true, 'encrypted' => true, 'data' => qdEncrypt(json_encode($data)), 'message' => 'OK'];
            echo json_encode($response);
        } else  if ($urlParts[1] == "getByDate") {
            $allSportsEvents = loadLTQDSportsEvents($_POST['category_id']);
            $data = [];

            foreach ($allSportsEvents as $row) {
                if ((strtotime($_POST['date']) <= strtotime($row['start_timestamp'])) && (strtotime($row['start_timestamp']) <= strtotime($_POST['date']) + 86400)) {
                    $team_a = loadLTQDSportsTeam($row['team_a_id']);
                    $team_b = loadLTQDSportsTeam($row['team_b_id']);
                    $channel_id_array = array_filter(array_map('intval', explode(',', $row['channel_id'])));
                    array_push($data, [
                        'id'              => $row['id'],
                        'team_a_id'       => $row['team_a_id'],
                        'team_b_id'       => $row['team_b_id'],
                        'backdrop'        => $row['backdrop'],
                        'start_timestamp' => $row['start_timestamp'],
                        'end_timestamp'   => $row['end_timestamp'],
                        'description'     => $row['description'],
                        'created_at'      => $row['created_at'],
                        'updated_at'      => $row['updated_at'],
                        'category_id'     => !empty($row['category_id']) ? $row['category_id'] : 0,
                        'channel_id'      => $channel_id_array,
                        'team_a'          => ['id' => $team_a['id'], 'name' => $team_a['name'], 'flag' => $team_a['flag'], 'created_at' => $team_a['created_at'], 'updated_at' => $team_a['updated_at']],
                        'team_b'          => ['id' => $team_b['id'], 'name' => $team_b['name'], 'flag' => $team_b['flag'], 'created_at' => $team_b['created_at'], 'updated_at' => $team_b['updated_at']]
                    ]);
                }
            }
            handleQdResponse($data);
        } else {
            $allCategories = loadLTQDSportsCategories();
            $data = [];
            foreach ($allCategories as $row) {
                array_push($data, $row);
            }
            handleQdResponse($data);
            break;
        }
        break;
    case "sports-events":
        if ($urlParts[1] == 'get') {
                $allSportsEvents = loadLTQDSportsEvents();
                $data = [];
                foreach ($allSportsEvents as $row) {
                    if ((strtotime($urlParts[2]) <= strtotime($row['start_timestamp'])) && (strtotime($row['start_timestamp']) <= strtotime($urlParts[2]) + 86400)) {
                        $team_a = loadLTQDSportsTeam($row['team_a_id']);
                        $team_b = loadLTQDSportsTeam($row['team_b_id']);
                        $channel_id_array = array_filter(array_map('intval', explode(',', $row['channel_id'])));
                        array_push($data, [
                            'id'              => $row['id'],
                            'team_a_id'       => $row['team_a_id'],
                            'team_b_id'       => $row['team_b_id'],
                            'backdrop'        => $row['backdrop'],
                            'start_timestamp' => $row['start_timestamp'],
                            'end_timestamp'   => $row['end_timestamp'],
                            'description'     => $row['description'],
                            'created_at'      => $row['created_at'],
                            'updated_at'      => $row['updated_at'],
                            'category_id'     => !empty($row['category_id']) ? $row['category_id'] : 0,
                            'channel_id'      => $channel_id_array,
                            'team_a'          => ['id' => $team_a['id'], 'name' => $team_a['name'], 'flag' => $team_a['flag'], 'created_at' => $team_a['created_at'], 'updated_at' => $team_a['updated_at']],
                            'team_b'          => ['id' => $team_b['id'], 'name' => $team_b['name'], 'flag' => $team_b['flag'], 'created_at' => $team_b['created_at'], 'updated_at' => $team_b['updated_at']]
                        ]);
                    }
                }
                handleQdResponse($data);
        } else if ($urlParts[1] == 'schedule-dates') {
            $allSportsEvents = loadLTQDSportsEvents();
            $data = [];
            foreach ($allSportsEvents as $row) {
                $datetime = new DateTime($row['start_timestamp']);
                $datetime->setTimezone(new DateTimeZone('UTC'));
                array_push($data, $datetime->format('Y-m-d H:i:s'));
            }
            $data = array_unique($data);
            handleQdResponse($data);
        }
        break;
    case "messages":
        $message = [[
            'id'              => 1,
            'conversation_id'       => 1,
            'created_at'       => '1676473446',
            'is_read'        => false,
            'message' => "This is going to work lovely.",
            'sender'   => 'AndyHax'
        ]];
        handleQdResponse($data);
        break;
}
