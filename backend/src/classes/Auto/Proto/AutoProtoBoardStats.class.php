<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2017-05-03 16:07:07                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoBoardStats extends AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'id' => LightMetaProperty::fill(new LightMetaProperty(), 'id', null, 'integerIdentifier', 'BoardStats', 8, true, true, false, null, null),
				'board' => LightMetaProperty::fill(new LightMetaProperty(), 'board', 'board_id', 'identifier', 'Board', null, true, false, false, 1, 3),
				'threadsActive' => LightMetaProperty::fill(new LightMetaProperty(), 'threadsActive', 'threads_active', 'integer', null, 4, false, true, false, null, null),
				'threadsNew' => LightMetaProperty::fill(new LightMetaProperty(), 'threadsNew', 'threads_new', 'integer', null, 4, false, true, false, null, null),
				'posts' => LightMetaProperty::fill(new LightMetaProperty(), 'posts', null, 'integer', null, 4, false, true, false, null, null),
				'uniquePosters' => LightMetaProperty::fill(new LightMetaProperty(), 'uniquePosters', 'unique_posters', 'integer', null, 4, false, true, false, null, null)
			);
		}
	}
?>