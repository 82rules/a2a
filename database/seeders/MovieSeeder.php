<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->movies()->map(function($movie) {
            Movie::factory()->create($movie);
        });
    }

    public function movies() {
        return collect([
            [
                'title' => 'Whispers in the Fog',
                'synopsis' => 'A detective unravels a dark conspiracy hidden beneath the misty streets of a coastal town.'
            ],
            [
                'title' => 'The Echo of Yesterday',
                'synopsis' => 'A time-traveling scientist must confront his past mistakes to save the future.'
            ],
            [
                'title' => 'Silent Revolutions',
                'synopsis' => 'The story of an underground rebellion in a dystopian world where speaking is forbidden.'
            ],
            [
                'title' => 'Lost in the Neon Abyss',
                'synopsis' => 'A cyberpunk hacker must survive the underworld of a futuristic megacity.'
            ],
            [
                'title' => 'The Celestial War',
                'synopsis' => 'Two alien races bring their cosmic battle to Earth, threatening the survival of humanity.'
            ],
            [
                'title' => 'Tales of the Forgotten',
                'synopsis' => 'A historian uncovers a series of lost stories from ancient civilizations.'
            ],
            [
                'title' => 'Midnight Whispers',
                'synopsis' => 'A group of strangers discovers a shared dream that leads them to a mysterious hidden realm.'
            ],
            [
                'title' => 'Fading Horizons',
                'synopsis' => 'An astronaut stranded on a distant planet must rely on her memories to survive.'
            ],
            [
                'title' => 'Blood on the Moon',
                'synopsis' => 'A revenge tale set in the lawless Wild West, where a lone rider seeks justice.'
            ],
            [
                'title' => 'Distant Echoes',
                'synopsis' => 'A paranormal investigator becomes trapped in a haunted mansion with no way out.'
            ],
            [
                'title' => 'Shadows of Eden',
                'synopsis' => 'A utopian society hides a dark secret, and one man must decide whether to expose the truth.'
            ],
            [
                'title' => 'Caged Hearts',
                'synopsis' => 'A couple struggles to keep their love alive while facing imprisonment in a totalitarian regime.'
            ],
            [
                'title' => 'Beyond the Horizon',
                'synopsis' => 'An adventurer seeks the mythical City of Gold, only to find it holds dangerous secrets.'
            ],
            [
                'title' => 'The Last Dawn',
                'synopsis' => 'A soldier returns home from war to find his family torn apart by political corruption.'
            ],
            [
                'title' => 'City of Broken Dreams',
                'synopsis' => 'In a gritty metropolis, a journalist uncovers a plot to destroy the city from within.'
            ],
            [
                'title' => 'Warriors of the Sun',
                'synopsis' => 'A group of elite soldiers must defend Earth from an alien invasion in the distant future.'
            ],
            [
                'title' => 'The Illusion of Time',
                'synopsis' => 'A physicist discovers a way to manipulate time but faces unintended consequences.'
            ],
            [
                'title' => 'Crimson Skies',
                'synopsis' => 'During World War II, a group of fighter pilots must outfly their enemies and confront their own fears.'
            ],
            [
                'title' => 'The Broken Crown',
                'synopsis' => 'A young prince must fight for his rightful place on the throne in a kingdom torn apart by war.'
            ],
            [
                'title' => 'Under the Crimson Tide',
                'synopsis' => 'A retired naval officer is called back to duty to prevent a nuclear catastrophe.'
            ],
            [
                'title' => 'The Glass Tower',
                'synopsis' => 'A heist in a high-security skyscraper goes awry, trapping the criminals inside with no escape.'
            ],
            [
                'title' => 'Silent Waters',
                'synopsis' => 'A small fishing village is haunted by a dark force that lurks beneath the sea.'
            ],
            [
                'title' => 'The Shadow of Olympus',
                'synopsis' => 'A warrior from ancient Greece embarks on a quest to save the gods from a new dark force.'
            ],
            [
                'title' => 'Echoes of Tomorrow',
                'synopsis' => 'A scientist builds a machine that can predict future disasters, but is it too late to change fate?'
            ],
            [
                'title' => 'Winds of Change',
                'synopsis' => 'A group of environmental activists battles corporate greed to save the planet from irreversible damage.'
            ],
            [
                'title' => 'Frozen Time',
                'synopsis' => 'An inventor creates a device that stops time, but each use erodes his grasp on reality.'
            ],
            [
                'title' => 'The Crimson Blade',
                'synopsis' => 'A former assassin comes out of retirement to seek revenge on the syndicate that betrayed her.'
            ],
            [
                'title' => 'The Forgotten Kingdom',
                'synopsis' => 'A forgotten prince returns from exile to reclaim his kingdom from an evil sorcerer.'
            ],
            [
                'title' => 'Shattered Mirrors',
                'synopsis' => 'A series of murders in a small town leads a detective to uncover a dark, supernatural force.'
            ],
            [
                'title' => 'Between Worlds',
                'synopsis' => 'A man discovers he can travel between parallel dimensions, but each one holds new dangers.'
            ],
            [
                'title' => 'The Keeper of Secrets',
                'synopsis' => 'A librarian is tasked with guarding an ancient book that holds the power to reshape reality.'
            ],
            [
                'title' => 'Empire of Shadows',
                'synopsis' => 'An ancient order of assassins controls a hidden empire, but one rogue member seeks to bring it down.'
            ],
            [
                'title' => 'The Silent Prophecy',
                'synopsis' => 'A mute girl holds the key to an ancient prophecy that could save her village from destruction.'
            ],
            [
                'title' => 'The Quantum Paradox',
                'synopsis' => 'A physicist discovers the multiverse, but every version of herself is trying to stop her from continuing.'
            ],
            [
                'title' => 'Ghosts of the Sea',
                'synopsis' => 'A haunted ship drifts into port, carrying the souls of sailors lost at sea for centuries.'
            ],
            [
                'title' => 'Steel City',
                'synopsis' => 'In a future dystopia, one woman leads a rebellion against the megacorporation ruling her city.'
            ],
            [
                'title' => 'Whispers in the Wind',
                'synopsis' => 'A young girl can communicate with spirits, and must use her gift to stop a rising evil.'
            ],
            [
                'title' => 'Edge of Forever',
                'synopsis' => 'An explorer stumbles upon a portal to another dimension, but what he finds there defies all logic.'
            ],
            [
                'title' => 'Cursed Kingdoms',
                'synopsis' => 'A young prince must lift an ancient curse that has plagued his family for generations.'
            ],
            [
                'title' => 'The Dark Emissary',
                'synopsis' => 'A mysterious figure appears in a medieval kingdom, sowing dissent and chaos wherever he goes.'
            ],
            [
                'title' => 'Wings of Fire',
                'synopsis' => 'A legendary dragon and a young warrior team up to defeat a dark sorcerer threatening the realm.'
            ],
            [
                'title' => 'Voices from the Past',
                'synopsis' => 'A historian uncovers a secret society that has been pulling the strings of history for centuries.'
            ],
            [
                'title' => 'The Phoenix Code',
                'synopsis' => 'A cryptographer must crack an ancient code to stop a global catastrophe.'
            ],
            [
                'title' => 'The Forbidden Path',
                'synopsis' => 'A group of adventurers sets out to find a mythical artifact, but the path to it is fraught with danger.'
            ],
            [
                'title' => 'The Shadowed Valley',
                'synopsis' => 'A family moves to a remote valley, only to discover they are not alone, and something watches from the shadows.'
            ],
            [
                'title' => 'Lost Kingdoms',
                'synopsis' => 'An archaeologist discovers the ruins of a long-forgotten civilization, but something sinister lurks beneath.'
            ],
            [
                'title' => 'The Eternal Knight',
                'synopsis' => 'A knight cursed with immortality searches for a way to end his suffering and find peace.'
            ],
            [
                'title' => 'Twilight of the Gods',
                'synopsis' => 'As the gods begin to fade from existence, one mortal is chosen to restore balance before the world ends.'
            ],
            [
                'title' => 'Riders of the Storm',
                'synopsis' => 'In a world ravaged by climate disasters, a group of survivors embarks on a dangerous journey to find a new home.'
            ],
            [
                'title' => 'The Silver Crown',
                'synopsis' => 'A young queen fights to keep her throne as rivals plot against her in a dangerous political game.'
            ]
        ]);
    }
}
