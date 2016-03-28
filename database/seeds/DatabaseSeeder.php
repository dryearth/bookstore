<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Category;
use App\Product;
use App\Review;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		//Member::Create(['username' => 'louis', 'password'=>'pw','secretquestion'=>'Where is your birth place?','secretanswer'=>'Hong Kong']);
		Member::Create(['username' => 'admin', 
						'password'=>'admin',
						'secretquestion'=>'Where is your birth place?',
						'secretanswer'=>'Hong Kong']);
		/*Category::Create ([
			'name'	=> 'Nature'
		]);
		Category::Create ([
			'name'	=> 'Architecture'
		]);
		Category::Create ([
			'name'	=> 'People'
		]);
		Category::Create ([
			'name'	=> 'Tech'
		]);
		Category::Create ([
			'name'	=> 'Animals'
		]);

    	$faker = Faker::create();
    	for ($i=0; $i<100; $i++){
    		$title 		= '';
    		$detail		= $faker->realText(450,2);
    		$hadstock 	= true;
    		$slug		= $title;
    		$publisher	= $faker->name();
    		$company 	= $faker->company();
    		$price 		= 0.0 + Rand(1,60000) / 100;
    		$cid 		= 0;
    		$imgsrc	 	= 'http://placeimg.com/268/249/'.'nature'.'/'.Rand(1,100);
    		switch (Rand(0,4)){
    			case 0:
	    			$cid 		= 1;
	    			$imgsrc	 	= 'http://placeimg.com/268/249/'.'nature'.'/'.Rand(1,100);
					break;
				case 1:
	    			$cid 		= 2;
	    			$imgsrc	 	= 'http://placeimg.com/268/249/'.'arch'.'/'.Rand(1,100);
					break;
				case 2:
	    			$cid 		= 3;
	    			$imgsrc	 	= 'http://placeimg.com/268/249/'.'people'.'/'.Rand(1,100);
					break;
				case 3:
	    			$cid 		= 4;
	    			$imgsrc	 	= 'http://placeimg.com/268/249/'.'tech'.'/'.Rand(1,100);
					break;
				case 4:
	    			$cid 		= 5;
	    			$imgsrc	 	= 'http://placeimg.com/268/249/'.'animals'.'/'.Rand(1,100);
					break;
			}
			$maxTitle = Rand(1,5);
			for ($j=0;$j < $maxTitle; $j++){
				$temp = '';
				switch (Rand(0,6)){
					case 0:
					$temp = $faker->cityPrefix();
					break;
					case 1:
					$temp = $faker->streetSuffix();
					break;
					case 2:
					$temp = $faker->citySuffix();
					break;
					case 3:
					$temp = $faker->word();
					break;
					case 4:
					$temp = $faker->century();
					break;
					case 5:
					$temp = $faker->lastName();
					break;
					case 6:
					$temp = $faker->stateAbbr();
					break;
				}
				$title .=' '. $temp;
			}
    		$newProduct = Product::Create ([
    			'cid'		=> $cid,
    			'title' 	=> ucwords($title),
    			'imgsrc'	=> $imgsrc,
    			'detail'	=> $detail,
    			'hadstock'	=> $hadstock,
    			'publisher'	=> ucwords($publisher),
    			'company'	=> ucwords($company),
    			'price'		=> $price
    			]);

    		$t=Rand(1,20);
    		for($n=0;$n<$t;$n++){
	    		Review::create([
	    			'pid'		=> $newProduct->id,
	    			'username'	=> $faker->name,
	    			'rating'	=> Rand(0,5),
	    			'detail'	=> $faker->realText('2000'),
	    			]);
    		}
    	}
		*/
    	$cid = Category::Create (['name'	=> 'Art'])->id;

    	$hadstock = true;
    	$faker = Faker::create();

    	$newProducts = array();
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Andy Goldsworthy: Ephemeral Works'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art1.jpg'),
		    'detail'	=> 'On an almost daily basis, Andy Goldsworthy makes art using the materials and conditions he encounters wherever he is, be it the land around his Scottish home, the mountain regions of France or Spain, or the sidewalks of New York City, Glasgow, or Rio de Janeiro. Out of earth, rocks, leaves, ice, snow, rain, sunlight, and shadow he creates works that exist briefly before they are altered and erased by natural processes. They are documented in his photographs, and their larger meanings are bound up with the forces that they embody: materiality, temporality, growth, vitality, permanence, decay, chance, labor, and memory.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Andy Goldsworthy'),
		    'company'	=> ucwords('Harry N. Abrams'),
		    'price'	=> 54
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Covert to Overt The UnderOverground Art of Shepard Fairey'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art2.jpg'),
		    'detail'	=> 'His signature blend of politics, street culture, and art makes Fairey unlike any other subculture/street artist working today. 
		This book showcases the significant amount of art he has created the last several years: street murals, mixed-media installations, art/music events, countless silk screens, and work from his extremely successful OBEY brand.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Shepard Fairey'),
		    'company'	=> ucwords('Rizzoli'),
		    'price'	=> 32
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Dust & Grooves Adventures in Record Collecting'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art3.jpg'),
		    'detail'	=> 'Dust & Grooves: Adventures in Record Collecting is an inside look into the world of vinyl record collectors in the most intimate of environments¡Xtheir record rooms. Compelling photographic essays from photographer Eilon Paz are paired with in-depth and insightful interviews to illustrate what motivates these collectors to keep digging for more records. The reader gets an up close and personal look at a variety of well-known vinyl champions, including Gilles Peterson and King Britt, as well as a glimpse into the collections of known and unknown DJs, producers, record dealers, and everyday enthusiasts. Driven by his love for vinyl records, Paz takes us on a five-year journey unearthing the very soul of the vinyl community.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Eilon Paz'),
		    'company'	=> ucwords('Ten Speed Press'),
		    'price'	=> 32
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Every Person in New York'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art4.jpg'),
		    'detail'	=> 'Jason Polan is on a mission to draw every person in New York, from cab drivers to celebrities. He draws people eating at Taco Bell, admiring paintings at the Museum of Modern Art, and sleeping on the subway. With a foreword by Kristen Wiig, Every Person in New York, Volume 1 collects thousands of Polan\'s energetic drawings in one chunky book. As full as a phone book and as invigorating as a walk down a bustling New York street, this is a new kind of love letter to a beloved city and the people who live there.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Jason Polan'),
		    'company'	=> ucwords('Chronicle Books'),
		    'price'	=> 16
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Humans of New York Stories'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art5.jpg'),
		    'detail'	=> 'In the summer of 2010, photographer Brandon Stanton began an ambitious project to single-handedly create a photographic census of New York City. The photos he took and the accompanying interviews became the blog Humans of New York. His audience steadily grew from a few hundred followers to, at present count, over fifteen million. In 2013, his book Humans of New York, based on that blog, was published and immediately catapulted to the top of the NY Times Bestseller List where it has appeared for over forty-five weeks. Now, Brandon is back with the Humans of New York book that his loyal followers have been waiting for: Humans of New York: Stories. Ever since Brandon began interviewing people on the streets of New York, the dialogue he\'s had with them has increasingly become as in-depth, intriguing and moving as the photos themselves. Humans of New York: Stories presents a whole new group of people in stunning photographs, with a rich design and, most importantly, longer stories that delve deeper and surprise with greater candor. Let Brandon Stanton and the Humans of New York he\'s photographed astonish you all over again this October.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Brandon Stanton'),
		    'company'	=> ucwords('St. Martin\'s Press'),
		    'price'	=> 17
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Maya Lin Topologies'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art6.jpg'),
		    'detail'	=> 'The first comprehensive monograph on the acclaimed American artist and architect, known for her environmental works and memorials that distill a tranquil yet texturally rich minimalism. ?Maya Lin is one of the most important public artists of this century. As an architecture student at Yale, Lin designed the Vietnam Veterans Memorial as a class project, entering it in the largest design competition in American history. Her winning proposal, a V-shaped wall of black stone etched with the names of 58,000 dead soldiers, has since become the most visited memorial in the nation¡¦s capital.This visually rich volume presents 50 projects from the last three decades that demonstrate the scope of Lin¡¦s creative process, featuring her own sketches and drawings and linked by her ideal of making a place for individuals within the landscape. With her environmental works Storm King Wavefield, Eleven-Minute Line (Sweden), and Pin River¡VYangtze (Beijing), Lin maintains a balance between art and architecture, drawing inspiration from culturally diverse sources.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Maya Lin'),
		    'company'	=> ucwords('Rizzoli'),
		    'price'	=> 41
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Maya Lin Topologies'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art6.jpg'),
		    'detail'	=> 'The first comprehensive monograph on the acclaimed American artist and architect, known for her environmental works and memorials that distill a tranquil yet texturally rich minimalism. ?Maya Lin is one of the most important public artists of this century. As an architecture student at Yale, Lin designed the Vietnam Veterans Memorial as a class project, entering it in the largest design competition in American history. Her winning proposal, a V-shaped wall of black stone etched with the names of 58,000 dead soldiers, has since become the most visited memorial in the nation¡¦s capital.This visually rich volume presents 50 projects from the last three decades that demonstrate the scope of Lin¡¦s creative process, featuring her own sketches and drawings and linked by her ideal of making a place for individuals within the landscape. With her environmental works Storm King Wavefield, Eleven-Minute Line (Sweden), and Pin River¡VYangtze (Beijing), Lin maintains a balance between art and architecture, drawing inspiration from culturally diverse sources.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Maya Lin'),
		    'company'	=> ucwords('Rizzoli'),
		    'price'	=> 41
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Butterflies of North America Titian Peale\'s Lost Manuscript'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art8.jpg'),
		    'detail'	=> 'The American artist and naturalist Titian Ramsay Peale II (1799¡V1885) had a passion for butterflies, and throughout his long life he wrote and illustrated an ambitious and comprehensive manuscript. The book, along with a companion volume on caterpillars, was never published, and it resides today in the Rare Book Collection of the American Museum of Natural History in New York. Now Peale¡¦s color plates, lovingly prepared for the printer by the artist more than 100 years ago, will be published for the first time in this beautiful volume. At last, Peale¡¦s life work, equivalent in scope and beauty to Audubon¡¦s Birds of North America, will be available to a wide audience. The book includes a foreword by Ellen V. Futter and text by Kenneth Haltman and David A. Grimaldi that describes the art and science Peale brought to his extraordinary work.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Kenneth Haltman'),
		    'company'	=> ucwords('Harry N. Abrams'),
		    'price'	=> 24
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Hirschfeld Century: Portrait of an Artist and His Age'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art9.jpg'),
		    'detail'	=> 'Here is Hirschfeld at age seventeen, working in the publicity department at Goldwyn Pictures (1920¡V1921), rising from errand boy to artist; his year at Universal (1921); and, beginning at age eighteen, art director at Selznick Pictures, headed by Louis Selznick (father of David O.) in New York. We see Hirschfeld, at age twenty-one, being influenced by the stylized drawings of Miguel Covarrubias, newly arrived from Mexico (they shared a studio on West Forty-Second Street), whose caricatures appeared in many of the most influential magazines, among them Vanity Fair. We see, as well, how Hirschfeld¡¦s friendship with John Held Jr. (Held¡¦s drawings literally created the look of the Jazz Age) was just as central as Covarrubias to the young artist¡¦s development, how Held¡¦s thin line affected Hirschfeld¡¦s early caricatures.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Al Hirschfeld'),
		    'company'	=> ucwords('Knopf'),
		    'price'	=> 26
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Hirschfeld Century: Portrait of an Artist and His Age'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Art10.jpg'),
		    'detail'	=> 'In April 2000, Mark Hogancamp was beaten and left for dead outside a bar in his hometown of Kingston, NY. Waking from a nine-day coma, he had no memory of the thirty-eight prior years of his life, including his ex-wife, family, artistic talents, or military service. To reconstruct his past, Hogancamp built, in his backyard, Marwencol, an imaginary village set in World War II Belgium, where everybody is welcome¡XGermans, Americans, French, British, and Russians¡Xas long as peace is kept. With 1:6 scale action figures and Barbie dolls, as well as toy armaments and meticulously built props, buildings, and clothes, Marwencol is an alternate reality, created with painstaking (and sometimes painful) realism and obsessive attention to detail.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Mark E. Hogancamp'),
		    'company'	=> ucwords('Chris Shellen'),
		    'price'	=> 35
		    ]);

		$cid = Category::Create (['name'	=> 'Computer'])->id;
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('About Face The Essentials of Interaction Design 4th Edition'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer1.jpg'),
		    'detail'	=> 'The essential interaction design guide, fully revised and updated for the mobile age About Face: The Essentials of Interaction Design, Fourth Edition is the latest update to the book that shaped and evolved the landscape of interaction design. This comprehensive guide takes the worldwide shift to smartphones and tablets into account. New information includes discussions on mobile apps, touch interfaces, screen size considerations, and more. The new full-color interior and unique layout better illustrate modern design concepts. The interaction design profession is blooming with the success of design-intensive companies, priming customers to expect "design" as a critical ingredient of marketplace success.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Alan Cooper'),
		    'company'	=> ucwords('Wiley'),
		    'price'	=> 20
		    ]);

		
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Android Native Development Kit Cookbook'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer2.jpg'),
		    'detail'	=> 'Feipeng Liu is a technology enthusiast with a focus on multimedia systems and applications. He started mobile applications development in 2008 on Windows Mobile. In 2010, he started developing apps for Android with NDK. His Android apps have been used by many users. One of his apps, Video Converter Android, reached 1 million downloads within 10 months. Feipeng received his B.ENG in Electrical and Electronic Engineering, Nanyang Technological University and Master of Computing degree in the Department of Computer Science, National University of Singapore.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Feipeng Liu'),
		    'company'	=> ucwords('Packt Publishing'),
		    'price'	=> 76
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Android NDK Beginners Guide - Second Edition'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer3.jpg'),
		    'detail'	=> 'Sylvain Ratabouil is an IT consultant, experienced in Android, Java, and C/C++. He has contributed to the development of digital and mobile applications for large companies as well as industrial projects for the space and aeronautics industries. As a technology lover, he is passionate about mobile technologies and cannot live without his Android smartphone.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Sylvain Ratabouil'),
		    'company'	=> ucwords('Packt Publishing'),
		    'price'	=> 49
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Badass Making Users Awesome'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer4.jpg'),
		    'detail'	=> 'The design and layout of this book play a key role in conveying the author\'s message. When creating the ebooks, we\'ve tried to keep the look and feel of the print edition, but this means that not all e-reading devices will support the files. The EPUB format is optimized for iPad. The Mobi files are optimized for Kindle Fire tablets and phones and for Kindle reading apps.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Kathy Sierra'),
		    'company'	=> ucwords('O\'Reilly Media'),
		    'price'	=> 21
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Internet Congestion Control 1st Edition'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer5.jpg'),
		    'detail'	=> 'The field of congestion control has seen many notable advances in recent years and the purpose of this book, which is targeted towards the advanced and intermediate reader, is to inform about the most important developments in this area. The book should enable the reader to gain a good understanding of the application of congestion control theory to a number of application domains such as Data Center Networks, Video Streaming, High Speed Links and Broadband Wireless Networks. When seen through the lens of analytical modeling, there are a number of common threads that run through the design and analysis of congestion control protocols in all these different areas, which are emphasized in this book. The book also cuts a path through the profusion of algorithms in the literature, and puts the topic on a systematic and logical footing.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Subir Varma'),
		    'company'	=> ucwords('Morgan Kaufmann'),
		    'price'	=> 57
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Internet Measurement Infrastructure, Traffic and Applications'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer6.jpg'),
		    'detail'	=> 'Although the Internet is now a planet-wide communication medium, we have remarkably little quantitative understanding of it. This ground breaking book provides a comprehensive overview of the important field of Internet Measurement, and includes a first detailed look at three areas: measurements of Internet infrastructure: routers, links, network connectivity and bandwidth, measurements of traffic on the Internet: packets, bytes, flows, sessions, etc., measurements of various key Internet applications: DNS, Web, Peer-to-Peer, and networked games.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Balachander Krishnamurthy Mark Crovella'),
		    'company'	=> ucwords('Wiley, John & Sons, Incorporated'),
		    'price'	=> 586
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Pro Android C++ with the NDK'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer7.jpg'),
		    'detail'	=> 'Onur Cinar has over 17 years of experience in design, development, and management of large scale complex software projects, primarily in mobile and telecommunication space. His expertise spans VoIP, video communication, mobile applications, grid computing, and networking technologies on diverse platforms. He has been actively working with Android platform since its beginning. He has a Bachelor of Science degree in Computer Science from Drexel University in Philadelphia, PA, United States. He is currently working at Skype as the Sr. Product Engineering Manager for Skype client on Android platform.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Onur Cinar'),
		    'company'	=> ucwords('Apress'),
		    'price'	=> 32
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Unity in Action Multiplatform Game Development in C# with Unity 5'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer8.jpg'),
		    'detail'	=> 'This book helps readers build successful games with the Unity game development platform. You will use the powerful C# language, Unity\'s intuitive workflow tools, and a state-of-the-art rendering engine to build and deploy mobile, desktop, and console games. Unity\'s single codebase approach minimizes inefficient switching among development tools and concentrates your attention on making great interactive experiences.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Joe Hocking'),
		    'company'	=> ucwords('Manning Publications'),
		    'price'	=> 23
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Windows 10 The Missing Manual'),
		    'imgsrc'	=> url('images/public_download/computerartimages/Stanley.Computer10.jpg'),
		    'detail'	=> 'With Windows 8, Microsoft completely reimagined the graphical user interface for its operating system, which now runs on both desktop PCs and tablets, but the overhaul was not without hitches and its dueling UIs (one designed for touch, the other for keyboards and mice) created significant confusion for users. Windows 10 (a free update to users of Windows 8 or Windows 7) fixes a number of the problems introduced by the revolution in Windows 8 and offers plenty of new features along, such as the new Spartan web browser, Cortana voice-activated ¡§personal assistant,¡¨ new universal apps (that run on tablet, phone, and computer), and more. But to really get the most out of the new operating system, you¡¦re going to need a guide.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('O\'Reilly Media'),
		    'company'	=> ucwords('David Pogue '),
		    'price'	=> 23
		    ]);

		$cid = Category::Create (['name' => 'History'])->id;

		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Last of the President\'s Men'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History1.jpg'),
		    'detail'	=> 'Bob Woodward exposes one of the final pieces of the Richard Nixon puzzle in his new book.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Bob Woodward'),
		    'company'	=> ucwords('Simon & Schuster'),
		    'price'	=> 116
		    ]);

		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Ardennes 1944: The Battle of the Bulge'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History2.jpg'),
		    'detail'	=> 'On December 16, 1944, Hitler launched his \‘last gamble\’ in the snow-covered forests and gorges of the Ardennes in Belgium, believing he could split the Allies by driving all the way to Antwerp and forcing the Canadians and the British out of the war. Although his generals were doubtful of success, younger officers and NCOs were desperate to believe that their homes and families could be saved from the vengeful Red Army approaching from the east. Many were exultant at the prospect of striking back.',
			
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Antony Beevor'),
		    'company'	=> ucwords('Viking'),
		    'price'	=> 133
		    ]);
			
		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Napoleon: A Life'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History3.jpg'),
		    'detail'	=> 'Austerlitz, Borodino, Waterloo: his battles are among the greatest in history, but Napoleon Bonaparte was far more than a military genius and astute leader of men. Like George Washington and his own hero Julius Caesar, he was one of the greatest soldier-statesmen of all times.',
			
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Andrew Roberts'),
		    'company'	=> ucwords('Penguin Books'),
		    'price'	=> 109
		    ]);

		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The English and Their History'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History4.jpg'),
		    'detail'	=> 'Robert Tombs\’s momentous The English and Their History is both a startlingly fresh and a uniquely inclusive account of the people who have a claim to be the oldest nation in the world. The English first came into existence as an idea, before they had a common ruler and before the country they lived in even had a name. They have lasted as a recognizable entity ever since, and their defining national institutions can be traced back to the earliest years of their history.',
			
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Robert Tombs'),
		    'company'	=> ucwords('Knopf'),
		    'price'	=> 109
		    ]);

		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('China 1945: Mao\'s Revolution and America\'s Fateful Choice'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History5.jpg'),
		    'detail'	=> "At the beginning of 1945, relations between America and the Chinese Communists couldn\’t have been closer. Chinese leaders talked of America helping to lift China out of poverty; Mao Zedong himself held friendly meetings with U.S. emissaries. By year’s end, Chinese Communist soldiers were setting ambushes for American marines; official cordiality had been replaced by chilly hostility and distrust, a pattern which would continue for a quarter century, with the devastating wars in Korea and Vietnam among the consequences. ",
			
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Richard Bernstein'),
		    'company'	=> ucwords('Vintage'),
		    'price'	=> 110
		    ]);
	
		 $newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Three Minutes in Poland: Discovering a Lost World in a 1938 Family Film'),
		    'imgsrc'	=> url('images/public_download/historyimages/Johnny.History6.jpg'),
		    'detail'	=> "When Glenn Kurtz stumbles upon an old family film in his parents closet in Florida, he has no inkling of its historical significance or of the impact it will have on his life. ",
			
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Glenn Kurtz'),
		    'company'	=> ucwords('Farrar, Straus and Giroux'),
		    'price'	=> 117
		    ]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('My Boyhood War: Warsaw 1944'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History7.jpg'),
			'detail'	=> 'My Boyhood War, Warsaw 1944 is an intensely personal account of Hryniewicz life in Poland during the Second World War, centered primarily on the Warsaw Uprising of August 1944. Despite being the longest urban battle between lightly armed irregular forces and the most professional Army of its day - in terms of ferocity, compared by the Germans themselves to the Battle of Stalingrad - the Warsaw Uprising still remains one of the least known chapters of World War II.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Bohdan Hryniewicz'),
			'company'	=> ucwords('The History Press'),
			'price'	=> 101
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('The Geography of Genius: A Search for the World\'s Most Creative Places from Ancient Athens to Silicon Valley'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History8.jpg'),
			'detail'	=> 'Travel the world with Eric Weiner, the New York Times bestselling author of The Geography of Bliss, as he journeys from Athens to Silicon Valley—and throughout history, too—to show how creative genius flourishes in specific places at specific times.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Eric Weiner'),
			'company'	=> ucwords('Simon & Schuster'),
			'price'	=> 101
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Fighter Pilot'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History9.jpg'),
			'detail'	=> 'The first and finest story of a fighter pilot in World War Two. Thus Group Captain Peter Townsend described Paul Richey\’s classic account of his part in the desperate battles over France in May of 1940. ',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Paul Richey'),
			'company'	=> ucwords('The History Press'),
			'price'	=> 118
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Commander Will Cushing: Daredevil Hero of the Civil War'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History10.jpg'),
			'detail'	=> 'Superbly entertaining.―S. C. Gwynne, best-selling author of Empire of the Summer Moon',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Jamie Malanowski'),
			'company'	=> ucwords('W. W. Norton & Company'),
			'price'	=> 118
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Paris Reborn: Napoléon III, Baron Haussmann, and the Quest to Build a Modern City'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History11.jpg'),
			'detail'	=> 'Stephane Kirkland gives an engrossing account of Napoleon III, Baron Haussmann, and one of the greatest transformations of a major city in modern history',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Stephane Kirkland'),
			'company'	=> ucwords('St. Martin\'s Griffin'),
			'price'	=> 78
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('The National Forgotten League: Entertaining Stories and Observations from Pro Football\'s First Fifty Years'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History12.jpg'),
			'detail'	=> 'The first fifty years of America\’s most popular spectator sport have been strangely neglected by historians claiming to tell the complete story of pro football.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Dan Daly'),
			'company'	=> ucwords('University of Nebraska Press'),
			'price'	=> 117
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Now I Know More: The Revealing Stories Behind Even More of the World\'s Most Interesting Facts'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History13.jpg'),
			'detail'	=> 'Every story in the book is interesting, and Lewis includes a bonus fact at the end of each story, which is a mini mind bender on its own.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Dan Lewis'),
			'company'	=> ucwords('Adams Media'),
			'price'	=> 93
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Inside the Hotel Rwanda: The Surprising True Story ... and Why It Matters Today '),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History14.jpg'),
			'detail'	=> 'In 2004, the Academy Award–nominated movie Hotel Rwanda lionized hotel manager Paul Rusesabagina for single-handedly saving the lives of all who sought refuge in the Hotel des Mille Collines during Rwanda\’s genocide against the Tutsi in 1994. Because of the film, the real-life Rusesabagina has been compared to Oskar Schindler, but unbeknownst to the public, the hotel\’s refugees do not endorse Rusesabagina\’s version of the events.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Edouard Kayihura'),
			'company'	=> ucwords('BenBella Books'),
			'price'	=> 110
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Lafayette in the Somewhat United States '),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History15.jpg'),
			'detail'	=> 'From the bestselling author of Assassination Vacation and The Partly Cloudy Patriot, an insightful and unconventional account of George Washington\’s trusted officer and friend, that swashbuckling teenage French aristocrat the Marquis de Lafayette.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Sarah Vowell'),
			'company'	=> ucwords('Riverhead Books'),
			'price'	=> 110
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Devotion: An Epic Story of Heroism, Friendship, and Sacrifice'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History16.jpg'),
			'detail'	=> 'Devotion tells the inspirational story of the U.S. Navy\’s most famous aviator duo, Lieutenant Tom Hudner and Ensign Jesse Brown, and the Marines they fought to defend. A white New Englander from the country-club scene, Tom passed up Harvard to fly fighters for his country. An African American sharecropper\’s son from Mississippi, Jesse became the navy\’s first black carrier pilot, defending a nation that wouldn\’t even serve him in a bar.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Adam Makos'),
			'company'	=> ucwords('Ballantine Books'),
			'price'	=> 110
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Charlie Mike: A True Story of Heroes Who Brought Their Mission Home'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History17.jpg'),
			'detail'	=> 'This is the true story of two decorated combat veterans linked by tragedy, who come home from the Middle East and find a new way to save their comrades and heal their country.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Joe Klein'),
			'company'	=> ucwords('Simon & Schuster'),
			'price'	=> 101
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('The Witch of Lime Street: Séance, Seduction, and Houdini in the Spirit World'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History18.jpg'),
			'detail'	=> 'History comes alive in this textured account of the rivalry between Harry Houdini and the so-called Witch of Lime Street, whose iconic lives intersected at a time when science was on the verge of embracing the paranormal.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('David Jaher'),
			'company'	=> ucwords('Crown'),
			'price'	=> 110
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Don\'t Give Up, Don\'t Give In: Lessons from an Extraordinary Life'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History19.jpg'),
			'detail'	=> 'Completed just two days before Louis Zamperini\’s death at age ninety-seven, Don\’t Give Up, Don\’t Give In shares a lifetime of wisdom, insight, and humor from one of the most incredible American lives of the past century (People). Zamperini\’s story has touched millions through Laura Hillenbrand\’s biography Unbroken and its blockbuster movie adaptation directed by Angelina Jolie. Now, in his own words, Zamperini reveals with warmth and great charm the essential values and lessons that sustained him throughout his remarkable journey.',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Louis Zamperini'),
			'company'	=> ucwords('Dey Street Books'),
			'price'	=> 78
		]);

		$newProducts[] = Product::Create ([
			'cid'	=> $cid,
			'title' => ucwords('Tambora: The Eruption That Changed the World'),
			'imgsrc'	=> url('images/public_download/historyimages/Johnny.History20.jpg'),
			'detail'	=> 'When Indonesia\'s Mount Tambora erupted in 1815, it unleashed the most destructive wave of extreme weather the world has witnessed in thousands of years. ',

			'hadstock'	=> $hadstock,
			'publisher'	=> ucwords('Gillen D. Arcy Wood'),
			'company'	=> ucwords('Princeton University Press'),
			'price'	=> 117
		]);

		$cid = Category::Create (['name'	=> 'Children'])->id;

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Wonderful Things You Will Be'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children1.jpg'),
		    'detail'	=> 'From brave and bold to creative and clever, the rhythmic rhyme expresses all the loving things that parents think of when they look at their children. With beautiful, and sometimes humorous, illustrations, and a clever gatefold with kids in costumes, this is a book grown-ups will love reading over and over to kids—both young and old. A great gift for any occasion, but a special stand-out for baby showers, birthdays, and graduation. The Wonderful Things You Will Be has a loving and truthful message that will endure for lifetimes.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Emily Winfield Martin'),
		    'company'	=> ucwords('Random House Books for Young Readers'),
		    'price'	=> 105
		    ]);
			
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('If Animals Kissed Good Night'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children2.jpg'),
		    'detail'	=> 'With whimsical art and playful rhyming verse, this picture book is now in board book format for the first time, perfect for bedtime snuggles.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Ann Whitford Paul, David Walker'),
		    'company'	=> ucwords('Farrar, Straus and Giroux (BYR)'),
		    'price'	=> 99
		    ]);
			
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Ten Tiny Toes'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children3.jpg'),
		    'detail'	=> 'Caroline Jayne Church brings her adorable toddler art and lovely rhymes to this joyful twist on the tried-and-true classic, HEAD, SHOULDERS, KNEES, AND TOES. From ears that wiggle to bellies that giggle, TEN TINY TOES is sure to inspire little ones as they learn to celebrate their mouth, ears, eyes, nose, and a love that grows and grows.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Caroline Jayne Church '),
		    'company'	=> ucwords('Cartwheel Books'),
		    'price'	=> 102
		    ]);
				

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Pups Save Christmas!'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children4.jpg'),
		    'detail'	=> 'It’s up to the pups of Nickelodeon’s PAW Patrol to save Christmas in Adventure Bay! Boys and girls ages 3 to 7 will get into the spirit with this hardcover storybook featuring full-color illustrations.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Golden Books'),
		    'company'	=> ucwords('Golden Books, Harry Moore'),
		    'price'	=> 128
		    ]);
			
		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Little Blue Truck Leads the Way board book'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children5.jpg'),
		    'detail'	=> 'Zooom! Wooeeee . . . ! "Make way!" The big city sure is a speedy, noisy place for a country truck like Blue. Everywhere Blue looks, he sees buses, police cars, taxis, vans, a street sweeper, and even the mayor’s limousine. With everyone pushing to be first, soon there’s a giant traffic jam! But even a wrangle-tangle is no match for Little Blue Truck, who comes to the rescue in true Blue style. Brimming with bright colors, sounds, and city energy, this adventure makes working together and taking turns more fun than ever. Now with a free downloadable party kit!',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Alice Schertle, Jill McElmurry'),
		    'company'	=> ucwords('HMH Books for Young Readers'),
		    'price'	=> 88
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Press Here'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children6.jpg'),
		    'detail'	=> 'Press the yellow dot on the cover of this book, follow the instructions within, and embark upon a magical journey! Each page of this surprising book instructs the reader to press the dots, shake the pages, tilt the book, and who knows what will happen next! Children and adults alike will giggle with delight as the dots multiply, change direction, and grow in size! Especially remarkable because the adventure occurs on the flat surface of the simple, printed page, this unique picture book about the power of imagination and interactivity will provide read-aloud fun for all ages!',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Herve Tullet'),
		    'company'	=> ucwords('Chronicle Books'),
		    'price'	=> 110
		    ]);	

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Story of Diva and Flea'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children7.jpg'),
		    'detail'	=> 'For as long as she could remember, Diva lived at 11 avenue Le Play in Paris, France. For as long as he could remember, Flea also lived in Paris, France-but at no fixed address. When Flea fl neurs past Diva\'s courtyard one day, their lives are forever changed. Together, Diva and Flea explore and share their very different worlds, as only true friends can do.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Mo Willems, Tony DiTerlizzi'),
		    'company'	=> ucwords('Disney-Hyperion'),
		    'price'	=> 70
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Mr. Putter & Tabby Turn the Page'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children8.jpg'),
		    'detail'	=> 'Mr. Putter and his fine cat, Tabby, love reading their favorite books over and over. So when Mr. Putter sees a sign at the library that says “Read Aloud with Your Pet at Story Time,” he signs up! But then Mr. Putter\'s friend and neighbor, Mrs. Teaberry, wants to join. If Mrs. Teaberry brings her good dog, Zeke, to the library, who knows what will happen? With Zeke up to his usual tricks, story time might get too exciting! This volume in the beloved Mr. Putter and Tabby series was named a Geisel Honor Book by the American Library Association.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Cynthia Rylant, Arthur Howard'),
		    'company'	=> ucwords('HMH Books for Young Readers'),
		    'price'	=> 92
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Diary of a Wimpy Kid: Old School'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children9.jpg'),
		    'detail'	=> 'Life was better in the old days. Or was it? That’s the question Greg Heffley is asking as his town voluntarily unplugs and goes electronics-free. But modern life has its conveniences, and Greg isn’t cut out for an old-fashioned world. With tension building inside and outside the Heffley home, will Greg find a way to survive? Or is going “old school” just too hard for a kid like Greg?',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Jeff Kinney'),
		    'company'	=> ucwords('Amulet Books'),
		    'price'	=> 103
		    ]);	


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Guinness World Records 2016'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Children10.jpg'),
		    'detail'	=> 'As well as all your favorite records for talented pets, superhuman achievements, big stuff and extreme vehicles, you\'ll find show-stopping superlatives from brand-new categories. Topics making their GWR debut include waterfalls, twins, ballooning, apps, lightning, manga, archaeology, drones, and pirates - and that\'s just for starters!',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Guinness World Records'),
		    'company'	=> ucwords('Guinness World Records'),
		    'price'	=> 150
		    ]);

		$cid = Category::Create (['name'	=> 'Travel'])->id;


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Birnbaum\'s 2016 Walt Disney World: The Official Guide'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel1.jpg'),
		    'detail'	=> 'Birnbaum is the most respected and well-known name in Disney guides--and the only official guide. This updated edition of Birnbaum\'s Walt Disney World Resort takes readers through Disney\'s biggest resort with ease and flair and includes the most accurate, current information on prices and attractions.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Birnbaum Guides'),
		    'company'	=> ucwords('Disney Editions'),
		    'price'	=> 203
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Journeys of a Lifetime: 500 of the World\'s Greatest Trips'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel2.jpg'),
		    'detail'	=> 'Journeys of a Lifetime spans the globe to highlight the best of the world\'s most famous and lesser known sojourns. It presents an incredible diversity of possibilities, from ocean cruises around Antarctica to horse treks in the Andes. Every continent and every possible form of transport is covered. ',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('National Geographic'),
		    'company'	=> ucwords('National Geographic'),
		    'price'	=> 299
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('In a Sunburned Country '),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel3.jpg'),
		    'detail'	=> 'In A Sunburned Country is Bill Bryson’s report on what he found in an entirely different place: Australia, the country that doubles as a continent, and a place with the friendliest inhabitants, the hottest, driest weather, and the most peculiar and lethal wildlife to be found on the planet. The result is a deliciously funny, fact-filled, and adventurous performance by a writer who combines humor, wonder, and unflagging ',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Bill Bryson'),
		    'company'	=> ucwords('Broadway Books'),
		    'price'	=> 158
   			 ]);
	

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Sweet Life in Paris: Delicious Adventures in the World\'s Most Glorious - and Perplexing - City'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel4.jpg'),
		    'detail'	=> 'The Sweet Life in Paris is a deliciously funny, offbeat, and irreverent look at the city of lights, cheese, chocolate, and other confections.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('David Lebovitz'),
		    'company'	=> ucwords('Broadway Books'),
		    'price'	=> 199
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('The Catskills: Its History and How It Changed America'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel5.jpg'),
		    'detail'	=> 'Stephen Silverman and Raphael Silver tell of the turning points that made the Catskills so vital to the development of America',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Stephen M. Silverman, Raphael D. Silver'),
		    'company'	=> ucwords('Knopf'),
		    'price'	=> 144
		    ]);

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Top 10 Iceland'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel6.jpg'),
		    'detail'	=> 'Rely on dozens of Top 10 lists — from the Top 10 nightlife hotspots to the Top 10 volcanoes, waterfalls, and hiking trails. And to save you time and money, there is even a list of budget tips and the Top 10 things to avoid.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('DK Publishing'),
		    'company'	=> ucwords('DK Eyewitness Travel'),
		    'price'	=> 144
		    ]);	


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Level Up Your Life: How to Unlock Adventure and Happiness by Becoming the Hero of Your Own Story'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel7.jpg'),
		    'detail'	=> 'Level Up Your Life uses the principles of video games, movies, television, comic books, and pop culture to teach you how to transform your life in extraordinary ways and collect real-world experiences that are just as amazing and fulfilling as the adventures of comic book heroes and video game characters. Learn how to design your own personal Epic Quest of Awesome through advice on health, fitness, travel, and finance.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Steve Kamb'),
		    'company'	=> ucwords('Rodale Books'),
		    'price'	=> 175
		    ]);
			

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Southern Living 50 Years: A Celebration of People, Places, and Culture'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel8.jpg'),
		    'detail'	=> 'For the last 50 years, Southern Living magazine has reported on and photographed what makes the South so very unique and how it has evolved; it\'s distinct regions, its music, its homes, its gardens, its food, and most importantly, its people. Now, to mark its Golden Anniversary, Southern Living presents a gorgeous gift book that tells the true story of the South as only Southerners and Southern Living can tell it. ',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('The Editors of Southern Living Magazine'),
		    'company'	=> ucwords('Oxmoor House'),
		    'price'	=> 177
		    ]);


		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('Barbarian Days: A Surfing Life'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel9.jpg'),
		    'detail'	=> 'Barbarian Days is an old-school adventure story, an intellectual autobiography, a social history, a literary road movie, and an extraordinary exploration of the gradual mastering of an exacting, little understood art. Today, Finnegan’s surfing life is undiminished. Frantically juggling work and family, he chases his enchantment through Long Island ice storms and obscure corners of Madagascar.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('William Finnegan'),
		    'company'	=> ucwords('Penguin Press'),
		    'price'	=> 181
		    ]);
			

		$newProducts[] = Product::Create ([
		    'cid'	=> $cid,
		    'title' => ucwords('All the Buildings in New York: That I\'ve Drawn So Far'),
		    'imgsrc'	=> url('images/public_download/travelchildrenimages/Helen.Travel10.jpg'),
		    'detail'	=> 'A charmingly illustrated journey through New York City, neighborhood by neighborhood. All the Buildings in New York is a love letter to New York City, told through James Gulliver Hancock’s unique and charming drawings of the city’s diverse architectural styles and cityscape.',
		    'hadstock'	=> $hadstock,
		    'publisher'	=> ucwords('Universe'),
		    'company'	=> ucwords('James Gulliver Hancock'),
		    'price'	=> 600
		    ]);	

		foreach($newProducts as $newProduct){
			$newProduct->created_at = $faker->dateTimeBetween('-2 months','-1 months');
			$newProduct->save();
			$t=Rand(0,50);
			for($n=0;$n<$t;$n++){
	    		$review = Review::create([
	    			'pid'		=> $newProduct->id,
	    			'username'	=> $faker->name,
	    			'rating'	=> Rand(0,5),
	    			'detail'	=> $faker->realText(Rand(100,2000)),
	    			]);
	    		$review->created_at = $faker->dateTimeBetween('-1 months','now');
	    		$review->save();
			}
		}
	}

}
