<?php

namespace Cary {
    class User {
        public function getName(){
            return 'From Cary';
        }
    }
}

namespace Mark {
    class User {
        public function getName(){
            return 'From Mark';
        }
    }
}



namespace {
    class Profile {
        public function getUserName($user){
            return $user->getName();
        }
    }


    $user = new \Mark\User();
    $profile = new Profile();
    echo $profile->getUserName($user);

}


