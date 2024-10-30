<?php

	/*
	 * Check for updates function
	 * pre_set_site_transient_update_plugins hook callback
	 * */
	function hi_check_for_updates( $transient )
	{
		if( empty( $transient->checked ) )
		{
			return $transient;
		}

		// get all versions
		$hi_versions = hi_versions();

		// get last version
		end( $hi_versions );
		$last_version = key( $hi_versions );

		if( version_compare( HIF_VERSION, $last_version, '<' ) )
		{
			$obj = new stdClass();
			$obj->slug = 'hover-effects-builder';
			$obj->plugin = 'hover-effects-builder/hovers.php';
			$obj->upgrade_notice = __( 'Automatic update is unavailable for this plugin.', 'hitd' ) . ' <a href="' . HIF_PLUGIN_CC . '">' . __( 'Download new version from CodeCanyon.', 'hitd' ) . '</a>';
			$obj->new_version = $last_version;
			$obj->url = '';
			$obj->package = '';
			$obj->name = 'Hover Effects Builder';

			$transient->response[ 'hover-effects-builder/hovers.php' ] = $obj;
		}
		return $transient;
	}
	add_filter( 'pre_set_site_transient_update_plugins', 'hi_check_for_updates' );


	function hi_upgrade_message()
	{
		echo ' <a href="' . HIF_PLUGIN_CC . '">' . __( 'Download new version from CodeCanyon.', 'hitd' ) . '</a>';
	}
	add_action( 'in_plugin_update_message-hover-effects-builder/hovers.php', 'hi_upgrade_message' );


	function hi_check_info( $false, $action, $arg)
	{
		if( property_exists( $arg, 'slug' ) && $arg->slug === 'hover-effects-builder' )
		{
			$information = hi_get_remote_information();

			$ups = get_option( HIF_UPDATES );

			$html = array();
			foreach( $ups as $ver => $clog )
			{
				$html[] = '<ul><li><strong>' . $ver . '</strong><ul>';
				foreach( $clog as $txt )
				{
					$html[] = '<li>' . $txt . '</li>';
				}
				$html[] = '</ul></li></ul>';
			}
			$information->sections['changelog'] = implode( '', $html );
			return $information;
		}
		return false;
	}
	add_filter( 'plugins_api', 'hi_check_info', 10, 3 );


	function hi_get_remote_information()
	{
		$obj = new stdClass();
		$obj->slug = 'hover-effects-builder';
		$obj->plugin_name = 'Hover Effects Builder';
		$obj->name = 'Hover Effects Builder';
		$obj->last_updated = date( 'Y/m/d', get_option( HIF_UPDATES . '_last' ) );
		$obj->sections = array( 'description' => '<a href="' . HIF_PLUGIN_CC . '">' . __( 'Download new version from CodeCanyon.', 'hitd' ) . '</a>', 'changelog' => '' );
		return $obj;
	}

	function hi_versions()
	{
		$xml_file = HIF_XML_FILE;
		if( function_exists( 'curl_init' ) )
		{
			$ch = curl_init( $xml_file );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
			$cache = curl_exec( $ch );
			curl_close( $ch );
		}
		else
		{
			$cache = file_get_contents( $xml_file );
		}

		if( strpos( (string) $cache, '<changelog>' ) === false || strpos( (string) $cache, '<changelogversion' ) === false )
		{
			$cache = '<?xml version="1.0" encoding="UTF-8"?><changelog><changelogversion versionName="1.0.0"><changelogtext>Initial release.</changelogtext></changelogversion></changelog>';
		}

		$xml = simplexml_load_string( $cache );

		$versions = array();

		foreach( $xml->children() as $changelogversion )
		{
			$texts = array();
			foreach( $changelogversion->children() as $k => $v )
			{
				$texts[ ] = ( string ) $v;
			}
			$versions[ ( string ) $changelogversion[ 'versionName' ] ] = $texts;
		}

		update_option( HIF_UPDATES, $versions );
		update_option( HIF_UPDATES . '_last', time() );

		return $versions;
	}
