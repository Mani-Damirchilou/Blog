<?php

namespace App\Traits;

use App\Models\Like;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function like()
    {
        $this->toggleLike($this->isDisLikedByUser(),$this->isLikedByUser(),1,-1);
    }

    public function disLike()
    {
        $this->toggleLike($this->isLikedByUser(),$this->isDisLikedByUser(),-1,1);
    }

    private function toggleLike($condition1,$condition2,$primaryVote,$secondaryVote)
    {
        if ($condition1)
        {
            $this->deleteLikeWithVote($secondaryVote);
            $this->createLikeWithVote($primaryVote);
        }
        elseif ($condition2)
        {
            $this->deleteLikeWithVote($primaryVote);
        }else{
            $this->createLikeWithVote($primaryVote);
        }
    }

    private function createLikeWithVote($vote)
    {
        return $this->likes()->create([
            'vote' => $vote,
            'user_id' => auth()->id()
        ]);
    }

    private function deleteLikeWithVote($vote)
    {
        $this->likes()->where('vote',$vote)->where('user_id',auth()->id())->delete();
    }

    public function isLikedByUser()
    {
        return $this->checkVote(1);
    }
    public function isDisLikedByUser()
    {
        return $this->checkVote(-1);
    }

    private function checkVote($vote)
    {
        return $this->likes()->where('vote',$vote)->where('user_id',auth()->id())->exists();
    }

    public function getDisLikesCount()
    {
        return $this->getCount(-1);
    }

    public function getLikesCount()
    {
        return $this->getCount(1);
    }

    private function getCount($vote)
    {
        return $this->likes()->where('vote',$vote)->count();
    }

    public function getIsLikedByUserAttribute()
    {
        return $this->isLikedByUser();
    }
    public function getIsDisLikedByUserAttribute()
    {
        return $this->isDisLikedByUser();
    }
}
