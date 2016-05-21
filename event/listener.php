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
			'core.modify_posting_auth'	=> 'locked_means_locked',
		);
	}

	public function __construct()
	{
	}
	
	public function locked_means_locked($event)
	{
		global $post_data;
		if (isset($post_data['topic_status']) && $post_data['topic_status'] == ITEM_LOCKED && ($event['mode'] == 'reply' || $event['mode'] == 'quote'))
		{
			trigger_error('TOPIC_LOCKED');
		}
	}
}
