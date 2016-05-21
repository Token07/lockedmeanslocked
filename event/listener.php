<?php

/**
*
* @package Locked Means Locked
* @copyright (c) 2016 Token07
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace token07\lockedmeanslocked\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.posting_modify_submit_post_before'	=> 'locked_means_locked',
		);
	}

	public function __construct()
	{
	}
	
	public function locked_means_locked($event)
	{
		if ($event['data']['topic_status'] == ITEM_LOCKED && ($event['mode'] == 'reply' || $event['mode'] = 'quote') && isset($_POST['lock_topic']))
		{
			trigger_error('TOPIC_LOCKED');
		}
	}
}