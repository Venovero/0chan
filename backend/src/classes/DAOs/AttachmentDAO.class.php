<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2017-03-02 15:27:09                    *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	class AttachmentDAO extends AutoAttachmentDAO
	{
        public static function makePublishToken() {
            return RandomUtils::makeString(16);
        }

        /**
         * @param Attachment|Identifiable $attachment
         * @return mixed
         */
        public function drop(Identifiable $attachment)
        {
            /** @var AttachmentImage[] $images */
            $images = $attachment->getImages()->getList();
            foreach ($images as $image) {
                AttachmentImage::dao()->drop($image);
            }

            parent::drop($attachment);

            if ($attachment->getEmbed()) {
                AttachmentEmbed::dao()->drop($attachment->getEmbed());
            }
            return $this;
        }

        public function useInPost(Post $post, $publishTokens)
        {
            $attachmentsPublishUpdateQuery = OSQL::update($this->getTable())
                ->set('post_id', $post->getId())
                ->set('published', true)
                ->where(Expression::isFalse('published'))
                ->andWhere(Expression::in('publish_token', $publishTokens))
                ->returning('id');
            $imageIds = DBPool::getByDao($this)->querySet($attachmentsPublishUpdateQuery);
            $imageIds = ArrayUtils::columnFromSet('id', $imageIds);
            $this->uncacheByIds($imageIds);

            return $imageIds;
        }
	}
?>