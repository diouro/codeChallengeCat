<?php


use Phinx\Seed\AbstractSeed;

class PopulateData extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();
        $users_data = [];
        for ($i = 0; $i < 100; $i++) {
            $users_data[] = [
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName
            ];
        }

        $this->table('users')->insert($users_data)->save();

        // Add roles
        $posts = $this->table('roles');
        $posts->insert([
            ['name' => 'Player'],
            ['name' => 'Coach']
        ])->save();
            
        // Add teams
        $posts = $this->table('teams');
        $posts->insert([
            ['name' => 'Barcelona'],
            ['name' => 'Real Madrid'],
            ['name' => 'Juventus'],
            ['name' => 'Chelsea'],
            ['name' => 'Liverpool']
        ])->save();
        
        // Add team_users
        $team_users_data = [];
        for ($i = 0; $i < 100; $i++) {
            $team_users_data[] = [
                'team_id' => rand(1,5),
                'user_id' => rand(1,100),
                'role_id' =>  rand(1,2)
            ];
        }
        $posts = $this->table('team_users')->insert($team_users_data)->save();
        
        $posts = $this->table('wellness')->truncate();
        // Add player wellness data
        $wellness_data = [];
        for ($i = 0; $i < 100; $i++) {
            
            $sleep = round(rand(-100,100) / 100,2);
            $soreness = round(rand(-100,100) / 100,2);
            $fatigue = round(rand(-100,100) / 100,2);
            $overall = round(($sleep + $soreness + $fatigue) / 3,2);

            $wellness_data[] = [
                'user_id' => rand(1,100),
                'sleep' => $sleep,
                'soreness' =>  $soreness,
                'fatigue' =>  $fatigue,
                'overall' => $overall,
                'recorded_at' => \Carbon\Carbon::now()->subDays(rand(1,1000))
            ];
        }
        $posts = $this->table('wellness')->insert($wellness_data)->save();
        
        

    }
}
