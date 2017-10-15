<?php
namespace GRGroup\GRTags\Traits;

use GRGroup\GRTags\Models\Tag;

trait TagTrait
{
	/**
	 * Relation tags
	 * @return void
	 */
	public function tags()
    {
        return $this->morphMany('GRGroup\GRTags\Models\Taggable', 'taggable');
    }

    /**
     * Update or create and check if it already exists
     * @param  string $tag
     * @return array
     */
    public function executeTag($tag)
    {
    	$tag = str_alphanumeric($tag);
    	$tag = str_start($tag, '#');

    	$tag = Tag::updateOrCreate([
			'name' => $tag
		]);

		$taggable = $this->tags();

    	$hasTaggable = $taggable
    		->where('tag_id', $tag->id)
    		->where('taggable_id', $this->id)
    		->where('taggable_type', get_class($this));

    	$hasTaggable = ( $hasTaggable->count() >= 1 );

    	if(!$hasTaggable){
    		$taggable->create([
				'tag_id' => $tag->id
			]);
    	}

		return $tag;
    }

    /**
     * Add a single tag
     * @param string $tag
     * @return  array
     */
	public function addTag($tag)
	{
		return $this->executeTag($tag);
	}

	/**
	 * Add multiple tags at once
	 * @param array $tags
	 * @return array
	 */
	public function addTags($tags)
	{
		foreach($tags as $tag){
			$this->executeTag($tag);
		}

		return $tags;
	}

	/**
	 * Get all tags from source
	 * @return GRGroup\GRTags\Models\Tag
	 */
	public function allTags()
	{
		$tags = collect($this->tags);
		$tagsIds = $tags->pluck('tag_id')->all();
		$tags = Tag::whereIn('id', $tagsIds);

		return $tags;
	}
}