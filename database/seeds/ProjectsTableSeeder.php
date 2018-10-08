<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::insert('INSERT INTO `projects` (`name`,`code`,`description`, `image`, `active`,  `view_count`) VALUES (?,?,?,?,?,?)',

            [
                'Defoult',
                'default',
                '<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>',
                'pic1.jpg',
                1,
                10
            ]);*/

        DB::table('projects')->insert([
            'name' => str_random(10),
            'code' => str_random(10),
            'description' => str_random(100),
            'image' => str_random('10') . '.jpg',
            'active' => 1,
            'view_count' => 10
        ]);

        Project::create([
            'name' => str_random(10),
            'code' => str_random(10),
            'description' => str_random(100),
            'image' => str_random('10') . '.jpg',
            'active' => 1,
            'view_count' => 10
        ]);
    }
}
