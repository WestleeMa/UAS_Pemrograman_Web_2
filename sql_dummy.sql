-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 05:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412021012`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Con_id` int(11) NOT NULL,
  `Con_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `Con_desc` text NOT NULL,
  `Con_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Con_id`, `Con_name`, `Con_desc`, `Con_date`) VALUES
(1, 'siapa ya', 'Saya suka website ini', '2023-07-06 08:59:40'),
(2, 'test', 'test', '2023-07-06 08:59:40'),
(3, 'Anonymous', 'a', '2023-07-06 08:59:40'),
(4, 'a', 'a', '2023-07-06 08:59:40'),
(7, 'test5', 'testtttttttttttt', '2023-07-06 10:06:14'),
(9, 'test lagi', 'test lah', '2023-07-06 13:20:41'),
(10, 'tessst', 'ini pesan', '2023-07-06 13:58:06'),
(11, 'Dia', 'Selamat malam', '2023-07-07 13:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_reply`
--

CREATE TABLE `contact_reply` (
  `id_reply` int(11) NOT NULL,
  `reply` text NOT NULL,
  `Con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_reply`
--

INSERT INTO `contact_reply` (`id_reply`, `reply`, `Con_id`) VALUES
(1, 'Reply dari Admin: Terima kasih atas dukungannya.', 1),
(8, 'Reply dari Admin: oh gitu', 10),
(9, 'Reply dari Admin: Pagi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Konten` text NOT NULL,
  `Gambar` varchar(1000) NOT NULL,
  `Sumber` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `Judul`, `Konten`, `Gambar`, `Sumber`, `tanggal`) VALUES
(2, 'AMD Missed Its Deadline For HYPR-RX Launch', 'Just before the launch of AMD\'s Best GPUs, the RX 7900 XT and RX 7900 XTX, the company showed off a new performance-enhancing technology called HYPR-RX that could drastically improve frame rates on supported Radeon GPUs. The technology was supposed to launch in the first half of 2023, but apparently, AMD forgot to release it now that the second half of 2023 has rolled in.\r\n\r\nHYPR-RX is a one-click optimization solution that automatically enables AMD Anti-Lag, Radeon Boost, and Radeon Super Resolution (RSR) in supported games or by a single button press in the Adrenalin control panel. As a result, HYPR-RX isn\'t a new technology in and of itself, but rather a one-click automated solution to streamline AMD\'s performance-enhancing technologies for AMD gamers.\r\n\r\nThis feature will be particularly useful for AMD gamers who don\'t know a lot about graphics settings or graphics technologies, or for people who just want to play games without worrying about GPU settings. You can think of HYPR-RX as the \"GeForce Experience\" equivalent for AMD gamers, but instead of changing in-game graphics settings, the feature enables driver-level AMD technologies instead.\r\n\r\nTo quickly recap, Anti-Lag, Boost, and RSR are all mature AMD technologies that have existed for some time now. AMD Anti-Lag is a driver-level latency enhancer that reduced input delays from your mouse and keyboard inputs to the monitor (similar to Nvidia Ultra Low Latency). Radeon Boost is a resolution performance optimizer, that adjusts resolution or shading rates (in DX12 games) depending on the game scene to increase frame rates. Radeon Super Resolution is a driver-level alternative to FidelityFX Super Resolution 1.0 (FSR) that upscales your game statically from a lower render resolution to your monitor\'s native resolution.\r\n\r\nAMD originally showed off HYPR-RX all the way back in November of 2022, promising a release in the first half of 2022. However, the company has either forgotten to alert the press about delays or forgotten about HYPR-RX altogether since the first half of 2023 has already passed.\r\n\r\nThankfully the feature in and of itself does not enable new technologies we haven\'t seen before. You can always replicate HYPR-RX\'s capabilities by manually enabling RSR, Anti-Lag, and Boost in the AMD Adrenalin control panel. This also applies to Nvidia users who can enable Ultra Low Latency mode, and Nvidia Image Scaling (NIS) in the Nvidia Control Panel to improve performance.', 'img/64a58e414ed54.jpg', 'https://www.tomshardware.com/news/hypr-rx-missed-deadline-amd', '2023-07-05 15:46:08'),
(12, 'GTA 5 PC, Lokasi Terbaru Gun Van yang Jadi Incaran Pemain Grand Theft Auto Online', 'Gun Van merupakan fitur eksklusif yang tersembunyi dalam game Grand Theft Auto V Online atau yang biasa dikenal sebagai GTA Online.\r\n\r\nDalam fitur ini, para pemain dapat menemukan berbagai senjata eksklusif, termasuk Railgun.\r\n\r\nPada akhir bulan Juni 2023, Gun Van dapat ditemukan di Thompson Scrapyard yang terletak di sekitar Sandy Shores.\r\n\r\nGun Van telah menjadi sorotan para pemain GTA Online karena keberadaannya yang misterius.\r\n\r\nTanpa petunjuk yang jelas dalam game, keberadaan Gun Van masih menjadi rahasia yang menarik untuk diungkap.\r\n\r\nNamun, bagi mereka yang merupakan pelanggan GTA+ (GTA Plus), petunjuk mengenai lokasi Gun Van dapat ditemukan secara eksklusif.\r\n\r\nNamun, jangan khawatir jika Anda tidak berlangganan GTA+. Anda masih memiliki kesempatan untuk menemukan Gun Van dan menikmati fitur menarik yang ditawarkannya.\r\n\r\nThompson Scrapyard di Sandy Shores menjadi tempat yang tepat untuk mengeksplorasi dan mencari Gun Van.\r\n\r\nMengenai Gun Van\r\nDi dalam Gun Van, Anda akan menemukan beragam senjata eksklusif, termasuk Railgun yang merupakan salah satu senjata yang paling diminati oleh para pemain.\r\n\r\nGun Van di Thompson Scrapyard adalah kesempatan yang tidak boleh Anda lewatkan untuk menambah koleksi senjata eksklusif dalam permainan GTA Online.\r\n\r\nSenjata Railgun, dengan kekuatan dan performa luar biasa, akan memberikan pengalaman yang seru dan mengesankan.\r\n\r\nLebih-lebih lagi, jika Anda sedang menjalankan misi atau bermain dengan teman-teman dalam mode Multiplayer.\r\n\r\nSekian informasi singkat seputar lokasi terbaru Gun Van di GTA Online. ', 'img/64a1b67c70c1f.jpg', 'https://kabarjoglosemar.pikiran-rakyat.com/news/pr-736830877/gta-5-pc-lokasi-terbaru-gun-van-yang-jadi-incaran-pemain-grand-theft-auto-online', '2023-07-07 12:19:24'),
(20, 'Overclocked RTX 4090 Conquers 4 GHz', 'Nvidia\'s AD102 breaks the 4 GHz barrier\r\n\r\nRenowned overclocker Allen \'Splave\' Golibersuch has succeeded in overclocking the Asus ROG Matrix GeForce RTX 4090 to a world record 4,005 MHz. This is the first time (although there will now be a flurry of attempts) for a GPU to hit 4 GHz. It comes on the back of a previous attempt which saw the card fall just short (3,945 MHz) of the magic number.\r\n\r\nThe new world record was set on an Asus ROG Matrix GeForce RTX 4090 graphics card (which may become the best graphics board money can buy when it is released), which features a cherry-picked GPU that is powered by a sophisticated voltage regulating module (VRM) that delivers up to 600W of very clean power (the maximum one can get from one 12VHPWR connector) to the processor. The GPU was cooled down using liquid nitrogen, which is common for extreme overclocking.\r\n\r\nThe Nvidia AD102 GPU on the graphics card managed to pass the GPUPi 32B 3.3 test at 4,005 MHz and then the GPUPi 1B 3.3 test a 4,020 MHz. GPUPi is certainly not a graphics program, it uses CUDA cores to calculate the value of Pi number to 32 billion and two 1 billion decimal places. Essentially, the workload does not need to overclock fixed function graphics hardware like texture units or render back ends. Nonetheless, 4 GHz on a GPU is quite an achievement.\r\n\r\nLast week Splave managed to boost the AD102 graphics processor on the Asus ROG Matrix RTX 4090 to a record-breaking 3,945 MHz. Rather than modifying the card, he simply substituted the original all-in-one liquid cooling system with a Kingpin Cooling TEK-9 Icon Extreme GPU pot designed for LN2, and incorporated three heaters along with three ElmorLabs HOT300 heater controllers. All further adjustments and overclocking were carried out using BIOS configurations and overclocking software.\r\n\r\nNvidia\'s AD102 was architected to for high clocks. The GPU developer relaxed transistor density, which possibly points to usage of high-performance libraries, so the graphics processor was destined to be fast. Meanwhile, clocking 76.3 billion transistors at 4 GHz is something that is quite unexpected. \r\n\r\n', 'img/64a6dd258340f.png', 'https://www.tomshardware.com/news/overclocked-rtx-4090-conquers-4-ghz', '2023-07-06 15:26:29'),
(21, 'AMD Ryzen 5 5600X3D Review: New Mid-Range Gaming Champ Is a Micro Center Exclusive', '95% of the 5800X3D’s gaming performance for 20% less cash\r\n\r\nAMD’s limited-edition $229 Ryzen 5 5600X3D comes with all the goodness of the company’s game-boosting 3D V-Cache technology, propelling it to the highest gaming performance in the mid-range price class. Overall, the 5600X3D is ~20% faster in gaming than the Intel Core i5-13400 that currently tops our list of the best CPUs for gaming. However, in a move that defies convention, the Ryzen 5 5600X3D comes to market as a Micro Center exclusive and will only be available while supplies last.\r\n\r\nThe six-core 12-thread Ryzen 5 5600X3D is a smaller version of the immensely popular eight-core $289 Ryzen 7 5800X3D that remains a top pick for gamers. However, the 5600X3D delivers 95% of the 5800X3D’s gaming performance for 20% less cash. As you can see in our CPU benchmarks hierarchy, at stock settings, the 5600X3D is also faster in gaming than the entire standard Ryzen 7000 lineup — including the $599 Ryzen 9 7950X. That’s because even though the Ryzen 5 5600X3D comes with two fewer cores and slightly lower clock speeds than its pricier 5800X3D counterpart, it still wields the same 96MB of game-boosting L3 cache.\r\n\r\nThe Ryzen 5 5600X3D rounds out AMD’s portfolio of gaming-specific X3D processors, which now spans from $229 up to $669. The chip excels at gaming, but all the usual caveats of 3D V-Cache technology apply — this tech results in lower clock speeds that ultimately reduce performance in some productivity apps, and the tech doesn’t accelerate all games.\r\n\r\nThe 5600X3D is a new entry in the older Ryzen 5000 series, so it comes with the Zen 3 architecture, 7nm process node, and drops into last-gen AM4 motherboards. In contrast, AMD\'s newest Ryzen 7000 chips come with the faster Zen 4 architecture etched on the 5nm process and drop into newer AM5 motherboards. However, those chips carry a premium and require more expensive DDR5 memory, while the 5600X3D supports more economical DDR4, giving it an easy win in terms of total system cost.\r\n\r\nMicro Center will also sell a $329 bundle with the Ryzen 5 56003XD, an ASUS B550-Plus TUF motherboard, and 16GB of G.Skill Ripjaws V DDR4 memory, a nearly unbeatable value. The retailer will also offer a pre-built $849 PowerSpec G516 system with a Radeon 6650XT, 16GB of memory, and a 500GB NVMe SSD.\r\n\r\nMicro Center will only sell the Ryzen 5 5600X3D processors in its stores while supply lasts, beginning July 7. AMD and Micro Center haven’t confirmed the number of processors that will be available, but the retailer expects to have stock for a few months. Micro Center currently has 25 outlets in 18 states, so the chip will be US-only. Let’s dive into the details.\r\n\r\nIntel’s Core i5-13400/F has dominated the ~$200 price point for new system builders, and AMD’s new Zen 4 offerings struggle to compete due to the premiums for DDR5 and AM5 motherboards. If gaming is all you care about, the Ryzen 5 5600X3D addresses that shortcoming with cheap and plentiful AM4 motherboards paired with inexpensive DDR4 memory.\r\n\r\nThe Ryzen 5 5600X3D operates at a 3.3 GHz base and 4.4 GHz boost clock and is built on the same underlying die configuration as the Ryzen 5 5600X/5600. As we’ve seen with AMD’s other X3D processors, the company has dialed back the peak frequency by a few hundred MHz compared to the X-equivalent (5600X), but the 5600X3D’s peak frequency is the same as the Ryzen 5 5600. The reduced frequencies are designed to keep voltages, and thus thermals, in check (the 3D-stacked chiplet traps some heat). Surprisingly, the Ryzen 5 5600X3D has a 105W TDP rating, 40W higher than its similar counterparts.\r\n\r\nThe 5600X3D supports DDR4-3200 memory and PCIe 4.0. It comes with nearly all the standard features of other Ryzen 5000 processors, except it doesn’t support direct CPU overclocking or the auto-overclocking Precision Boost Overdrive. As a slight consolation, the 5600X3D does support memory overclocking, though we found in our testing that memory overclocking has a very small impact. Some motherboard makers do have unofficial workarounds to enable various levels of overclocking for the Ryzen 7 5800X3D, and the same unofficial (and warranty-voiding) options will also be available for the 5600X3D.\r\n\r\nAs with all of AMD’s other X3D models, the Ryzen 5 5600X3D doesn’t have an iGPU or bundled cooler. We haven’t been told of any specific cooler recommendations, but given the TDP rating, it likely requires a 240mm liquid cooler (or air equivalent) like the 105W Ryzen 7 5800X3D.\r\n\r\nThe Ryzen 5 5600X3D Backstory\r\nThe full story of the Ryzen 5 5600X3D will likely remain shrouded in secrecy for some time, but we’ve pieced together information from multiple sources. AMD hasn’t provided an official comment, but sources close to the matter tell us these chips were “purpose-built” to be launched as Ryzen 5 5600X3D parts. As such, they aren’t made of defective Ryzen 7 5800X3D processors.\r\n\r\nTypically, we would expect the 5600X3D chips to be constructed from eight-core Ryzen 7 5800X3D processors that suffered defects in manufacturing and were then harvested as six-core models. However, the 3D V-Cache manufacturing process is more expensive than AMD’s standard packaging technique, so AMD only earmarks its fully validated silicon (Known Good Die – KGD) for the expensive 3D chip-stacking treatment. For Ryzen 7 5800X3D models, that means a fully working eight-core KGD.\r\n\r\nAMD sends these KGD to a separate hybrid bonding stage that employs TSMC’s SoIC hybrid bonding process to link the base die to the 3D-stacked L3 chiplet. This connection occurs through two rows of TSVs (Through Silicon Vias) embedded in the cache portion of the underlying die, not the cores, and the stacked chiplet does not overlap the core area (deep dive into the process here).\r\n\r\nWe’re told that AMD purposefully created the 5600X3D chips by either mounting a cache chiplet atop a standard down-binned six-core die (like the one found in a 5600X), or intentionally disabling cores on some 5800X3D models. It’s possible that the description of the former process, which does use a down-binned standard die, resulted in reports that the 5600X3D are merely down-binned 5800X3D processors.\r\n\r\nAccording to the batch number, our sample was built in week 48 (Nov/Dec) of 2022, but the design was copyrighted in 2021. Motherboard vendors tell us that the Ryzen 5 5600X3D was enabled in the same AGESA revision (underlying BIOS code) that enabled the Ryzen 7 5800X3D when it launched back in April 2022. Therefore, any AM4 motherboard with an AGESA 1.2.0.6b (or newer) BIOS will work with the 5600X3D.\r\n\r\nDuring its exploration process into the new X3D tech, AMD game-planned and tested several Ryzen 5000X3D models, including the prototype Ryzen 9 5900X3D that Lisa Su teased at Computex 2021. However, like the 5900X3D, we’re told that the Ryzen 5 5600X3D ultimately wasn’t launched due to unspecified “business factors.” Considering the 5600X3D\'s exceptional performance-per-dollar ratio, it’s logical to think the 5600X3D threatened to severely cannibalize AMD’s Ryzen 7 5800X3D sales, not to mention sales of the then-forthcoming AM5 platform. Why buy the flagship gaming models when a less-expensive variant offers the lion’s share of the performance for less cash?\r\n\r\nAMD has said repeatedly that the AM4 platform will serve as a value platform for the near future, but the 5600X3D chips are only available for a limited time, and AMD will not produce more. Combined with the fact that AMD now has newer-generation Ryzen 7000X3D chips, perhaps cannibalization isn’t as much of a concern. Pricing has also dropped quite a bit on the 5800X3D since it launched, and while $60 still separates the new 5600X3D from its sibling, in terms of total system cost that\'s not a huge hurdle — if you don\'t pick up a 5600X3D in the next few months and they sell out, you can still opt for the slightly more expensive chip with two extra cores.\r\n\r\nBoth Intel and AMD have offered limited edition chips in the past, but it is unprecedented in recent memory to give a single retailer the full allotment of supply. The 5600X3D is available in the US only, but both Intel and AMD have also offered other region-specific chips in the past, particularly for the China market.', 'img/64a6e0bb266e2.jpg', 'https://www.tomshardware.com/reviews/amd-ryzen-5-5600x3d-cpu-review', '2023-07-06 15:41:47'),
(22, 'Running Linux On The ROG Ally Doesn\'t Help Battery Life', 'Changing operating systems won\'t squeeze out more playtime.\r\n\r\nValve\'s Steam Deck runs Linux, while the Asus ROG Ally is a Windows machine. But both are computers, so you can install what you want on them. Phoronix compared Valve\'s Steam Deck and the new Asus ROG Ally on Linux explicitly to see which handheld console is better at gaming under similar operating systems. With the OS swapped from Windows 11 to Arch Linux on the ROG Ally, the performance margin between the two consoles didn\'t change much. The ROG Ally exhibited superior gaming performance to the Steam Deck, but the Steam Deck was able to outperform the ROG Ally in power efficiency and battery life.\r\n\r\nTesting the ROG Ally on Linux is definitely an interesting proposition, since many Linux distros arguably feature less bloatware than Microsoft\'s latest Windows 11 operating system, which could improve performance and battery life. Linux versions also come with different AMD-based drivers that can change the performance behavior (scheduling) of AMD\'s Ryzen CPUs in Linux compared to Windows, which can potentially improve performance in some cases.\r\n\r\nBut according to Phoronix\'s testing, installing Linux on the ROG Ally didn\'t really change its behavior compared to running games on Windows 11. The handheld was still faster than the Steam Deck in the right performance profiles, but still lost the race in efficiency, with the Steam Deck consuming far less power than the ROG Ally.\r\n\r\nEven when the ROG Ally was running in its more power-efficient modes, the handheld could only match the performance of the Steam Deck in most cases and was unable to drastically outperform it.\r\n\r\nFor instance, in Cyberpunk 2077, the ROG Ally ran an average of 61 FPS with Arch Linux\'s ACPI performance profile but dropped down to 45 FPS when running in the OS\'s standard power profile. The Steam Deck (which is still running SteamOS) was able to almost match the ROG Ally\'s in its non-performance power setting, outputting 44.66 FPS average.\r\n\r\nIn terms of power consumption, the Steam Deck was massively better, consuming an average of just 10.76 watts in Cyberpunk 2077, while the ROG Ally in its performance preset consumed 30W of power - 3x more power than the Steam Deck. Sadly, the ROG Ally\'s more power-efficient profile doesn\'t save it here, and still consumed more power than the Steam Deck, coming in at 14.77 watts average.\r\n\r\nCyberpunk 2077 was one of the worst-case scenarios for the ROG Ally, however, most of Phoronix\'s testing suit still exhibited similar behavior. The only benchmarks that didn\'t see this behavior were the CPU tests, which unsurprisingly showed substantially better performance with the ROG Ally in all circumstances compared to the Steam Deck — thanks to the far newer Zen 4 architecture and four additional CPU cores.\r\n\r\nComing back to Linux specifically, Phoronix\'s results align closely with our own review of the ROG Ally (running Windows 11), in that the Steam Deck was able to greatly outperform the ROG Ally in battery life and power efficiency in the console\'s performance profile. Sure you could back down to a more power-efficient mode, but you\'d be getting the same performance as the Steam Deck, with hardware that is two generations newer.\r\n\r\nPhoronix\'s results proved that the ROG Ally\'s efficiency differences are most likely related to the hardware and cannot be rectified with an OS swap.', 'img/64a6e3bbb24cf.jpg', 'https://www.tomshardware.com/news/running-linux-on-rog-ally-doesnt-solve-battery-life-problems', '2023-07-06 15:54:35'),
(23, 'Intel kills off ancient high-end desktop Cascade Lake-X CPUs and X299 chipset', 'Intel has popped a cap into its elderly HEDT or High End Desktop CPUs and motherboard chipsets. Yup, Cascade Lake-X and the X299 chipset that support it are goners according to new Product Discontinuation Notices (PCNs) from Intel.\r\n\r\nCascade Lake-X, of course, dates back to 2019. As its 10th Gen nomenclature implies, the Intel Core i9 10980XE Extreme Edition CPU (and its three other Cascade Lake-X siblings) was based on pretty ancient tech being a light revision of ye olde Skylake.\r\n\r\nStill, what Cascade Lake-X did have going for it, apart from fully 18 cores running at up to 4.8GHz, was bags of bandwidth from a quad-channel memory controller and 48 PCIe lanes, albeit the latter are only Gen 3.0 spec, which means you only need 12 PCIe Gen 5 lanes to match that aspect of Cascade Lake-X\'s throughput.\r\n\r\nInevitably, with the demise of Cascade Lake-X CPUs comes the end of support chipset production. The X299 chipset and its LGA2066 socket are toast, too. X299 is even older than Cascade Lake-X, of course, having launched way back in the mists of 2017 and supported Skylake-X and Kaby Lake-X CPUs, too.\r\n\r\nTaken in the round, it means Intel no longer operates in the HEDT market, though the impact of the product discontinuation isn\'t instant. Unlike Intel\'s cancellation of its Arc A770 LE graphics cards, which had immediate effect, Intel says shipments of Cascade Lake-X CPUs and X299 chipsets will actually continue until January 2025. \r\n\r\nIntel indicates it will continue to accept orders until April next year. For us, these chips are no great loss. For gaming, Intel\'s newer Alder Lake and Raptor Lake CPUs are simply faster. Frankly, even for tasks like video encoding, a top end Raptor Lake chip like the Core i9 13900K will be quicker than any Cascade Lake-X CPU.\r\n\r\nInstead, Cascade Lake-X and the X299 chipset is only of continuing interest for very specific workflows where the quad-channel memory controller or ability to slot in oodles of PCIe peripherals is absolutely critical.\r\n\r\nFor such applications, in future customers will have to shift over to even pricier Xeon workstation platforms. As things stand, Intel has not announced a new HEDT line based on its latest Sapphire Rapids Xeon CPUs. So mainstream Raptor Lake and likely a Raptor Lake refresh later this year will be as good as it gets for the foreseeable.', 'img/64a817b08947c.jpg', 'https://www.pcgamer.com/intel-kills-off-ancient-high-end-desktop-cascade-lake-x-cpus-and-x299-chipset/', '2023-07-08 13:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `Nama_barang` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Harga` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_produk`, `Nama_barang`, `Deskripsi`, `Harga`, `gambar`, `tipe`, `tanggal`, `stok`) VALUES
(1, 'GIGABYTE RTX 2080 TI', 'Chipset\r\nGeForce RTX™ 2080 Ti\r\n\r\nCore Clock\r\nOC mode: up to 1665 MHz\r\nGaming mode: up to 1650 MHz\r\n(Reference card: 1545 MHz)\r\n\r\nCUDA® Cores\r\n4352\r\n\r\nMemory Clock\r\n14000 MHz\r\n\r\nMemory Size\r\n11 GB\r\n\r\nMemory Type\r\nGDDR6\r\n\r\nMemory Bus\r\n352 bit\r\n\r\nMemory Bandwidth (GB/sec)\r\n616 GB/s\r\n\r\nCard Bus\r\nPCI-E 3.0 x 16\r\n\r\nDigital max resolution\r\n7680x4320@60Hz\r\n\r\nMulti-view\r\n4\r\n\r\nCard size\r\nL=286.5 W=114.5 H=50.2 mm\r\n\r\nPCB Form\r\nATX\r\n\r\nDirectX\r\n12\r\n\r\nOpenGL\r\n4.6\r\n\r\nPower requirement\r\n750W\r\n\r\nPower Connectors\r\n8 Pin*2\r\n\r\nOutput\r\nDisplayPort 1.4 *3\r\nHDMI 2.0b *1\r\nUSB Type-CTM(support VirtualLinkTM) *1\r\n\r\nSLI support\r\n2-way NVIDIA NVLINKTM', 6500000, 'img/o201808201633495922.png', 'Hardware', '2023-07-07 19:36:50', 10),
(2, 'GeForce RTX® 4090 GAMING X TRIO 24G', 'Model Name \r\nGeForce RTX® 4090 GAMING X TRIO 24G\r\n\r\nGraphics Processing Unit \r\nNVIDIA® GeForce RTX® 4090\r\n\r\nInterface \r\nPCI Express® Gen 4\r\n\r\nCore Clocks\r\nExtreme Performance: 2610 MHz (MSI\r\nCenter) Boost: 2595 MHz (GAMING & SILENT Mode)\r\n\r\nCUDA® CORES \r\n16384 Units\r\n\r\nMemory Speed \r\n21 Gbps\r\n\r\nMemory \r\n24GB GDDR6X\r\n\r\nMemory Bus \r\n384-bit\r\n\r\nOutput\r\nDisplayPort x 3 (v1.4a)\r\nHDMI™ x 1 (Supports 4K@120Hz HDR, 8K@60Hz HDR, and Variable Refresh Rate as specified in HDMI 2.1a)\r\n\r\nHDCP Support \r\nY\r\n\r\nPower consumption \r\n450W\r\n\r\nPower connectors \r\n16-pin x 1\r\n\r\nRecommended PSU \r\n850 W\r\n\r\nCard Dimension (mm) \r\n337 x 140 x 77 mm\r\n\r\nWeight (Card / Package) \r\n2170 g / 3093 g\r\n\r\nDirectX Version Support \r\n12 Ultimate\r\n\r\nOpenGL Version Support \r\n4.6\r\n\r\nMaximum Displays \r\n4\r\n\r\nG-SYNC® technology \r\nY\r\n\r\nDigital Maximum Resolution \r\n7680x4320', 30500000, 'img/64a90bddb5cd7.png', 'Hardware', '2023-07-08 07:20:19', 5),
(5, 'MICROSOFT OFFICE 365 PERSONAL ORIGINAL LICENSE 3 YEAR', 'MICROSOFT OFFICE 365 PERSONAL ORIGINAL LICENSE 3 YEAR\r\nRESMI\r\n\r\nMicrosoft Word\r\nMicrosoft Excel\r\nMicrosoft PowerPoint\r\nMicrosoft Outlook\r\nMicrosoft OneNote', 1300000, 'img/64a96d790b08c.jpg', 'Software', '2023-07-08 14:06:49', 100),
(6, 'Corsair Vengeance LPX PC25600 3200Mhz DDR4 32GB 2x16GB', 'Memory Corsair Vengeance LPX PC25600 3200Mhz DDR4 32GB Dual Channel - 2x16GB Corsair Ram CMK32GX4M2E3200C16\r\n\r\nVengeance LPX memory is designed for high-performance overclocking. The heatspreader is made of pure aluminum for faster heat dissipation, and the eight-layer PCB helps manage heat and provides superior overclocking headroom. Each IC is individually screened for performance potential.\r\nThe DDR4 form factor is optimized for the latest Intel X99 Series motherboards and offers higher frequencies, greater bandwidth, and lower power consumption than DDR3 modules. Vengeance LPX DDR4 modules are compatibility-tested across X99 Series motherboards for reliably fast performance. And, theyre available in multiple colors to match your motherboard, your components, or just your style\r\n\r\nFeatures :\r\nCompatibility tested across X99 and 100 Series motherboards for reliably fast performance\r\nDesigned for high-performance overclocking\r\nPure aluminum heat spreader for faster heat dissipation and cooler operation\r\nXMP 2.0 support for trouble-free, automatic overclocking\r\nLow-profile design fits in smaller spaces\r\nAvailable in multiple colors to match your motherboard or your system\r\n\r\nTECH SPECS\r\nFan Included No\r\nMemory Configuration Dual / Quad Channel\r\nMemory Series VENGEANCE LPX\r\nMemory Type DDR4\r\nMemory Size 32GB Kit (2 x 16GB)\r\nTested Latency 16-18-18-36\r\nTested Voltage 1.35V\r\nTested Speed 3200MHz\r\n\r\nMemory Color BLACK\r\nSPD Latency 15-15-15-36\r\nSPD Speed 2133MHz\r\nSPD Voltage 1.2V\r\nSpeed Rating PC4-25600 (3200MHz)\r\nCompatibility Intel 100 Series,Intel 200 Series,Intel 300 Series,Intel X299\r\nHeat Spreader Anodized Aluminum\r\nPackage Memory Format DIMM\r\nPerformance Profile XMP 2.0\r\nPackage Memory Pin 288\r\n\r\nPackage contents\r\n2 x 16GB memory modules', 1275000, 'img/64a9831452a37.jpg', 'Hardware', '2023-07-08 15:39:00', 999),
(7, 'MSI MPG Z790 EDGE WIFI | Motherboard Intel Z790 LGA 1700 DDR5 ATX', 'CPU\r\n- Supports 12th/13th Gen Intel® Core™ Processors, Pentium® Gold and Celeron® Processors\r\n- LGA 1700\r\n\r\nChipset\r\n- Intel Z790\r\n\r\nMemory\r\n- 4x DDR5, Maximum Memory Capacity 128GB\r\n- Memory Support 7200+(OC)/ 7000(OC)/ 6800(OC)/ 6600(OC)/ 6400(OC)/ 6200(OC)/ 6000(OC)/ 5800(OC)/ 5600(JEDEC)/ 5400(JEDEC)/ 5200(JEDEC)/ 5000(JEDEC)/ 4800(JEDEC) MHz\r\n\r\nGraphics\r\n- 1x HDMI™\r\n- 1x DisplayPort\r\n\r\nExpansion Slots\r\n- 2x PCI-E x16 slot\r\n- 1x PCI-E x1 slot\r\n- PCI_E1 PCIe 5.0 supports up to x16 (From CPU)\r\n- PCI_E2 PCIe 3.0 supports up to x1 (From Chipset)\r\n- PCI_E3 PCIe 4.0 supports up to x4 (From Chipset)\r\n\r\nStorage\r\n- 5x M.2 slot\r\n- M.2_1 (From CPU) supports up to PCIe 4.0 x4 , supports 22110/2280/2260 devices\r\n- M.2_2 (From Chipset) supports up to PCIe 4.0 x4 , supports 2280/2260 devices\r\n- M.2_3 (From Chipset) supports up to PCIe 4.0 x4 / SATA mode, supports 2280/2260/2242 devices\r\n- M.2_4 (From Chipset) supports up to PCIe 4.0 x4 , supports 2280/2260/2242 devices\r\n- M.2_5 (From Chipset) supports up to PCIe 4.0 x4 , supports 2280/2260 devices\r\n- 7x SATA 6G port\r\n\r\nEthernet\r\n- Intel® 2.5Gbps LAN\r\n\r\nWireless LAN & BLUETOOTH®\r\n- Intel® Wi-Fi 6E\r\n- The Wireless module is pre-installed in the M.2 (Key-E) slot\r\n- Supports MU-MIMO TX/RX, 2.4GHz / 5GHz / 6GHz* (160MHz) up to 2.4Gbps\r\n- Supports 802.11 a/ b/ g/ n/ ac/ ax\r\n- Supports Bluetooth® 5.3**, FIPS, FISMA\r\n\r\nForm Factor\r\n- ATX\r\n- 243.84mmx304.8mm', 7269000, 'img/64a983a680f31.jpg', 'Hardware', '2023-07-08 15:41:26', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `User_ID`, `id_produk`, `Status`) VALUES
(14, 'West21', 2, 'Purchased'),
(15, 'West21', 2, 'Purchased'),
(29, 'Test1', 2, 'Purchased'),
(30, 'Test1', 1, 'Purchased'),
(33, 'Test1', 1, 'Purchased'),
(34, 'Test1', 2, 'Purchased'),
(35, 'Test1', 1, 'Purchased'),
(36, 'Test1', 1, 'Purchased'),
(43, 'Test1', 2, 'Purchased'),
(44, 'Test1', 2, 'Purchased'),
(45, 'Test1', 2, 'Purchased'),
(46, 'Test1', 2, 'Purchased'),
(47, 'Test1', 2, 'Purchased'),
(48, 'Test1', 2, 'Purchased'),
(49, 'Test1', 2, 'Purchased'),
(50, 'Test1', 1, 'Purchased'),
(51, 'Test1', 1, 'Purchased'),
(52, 'West21', 2, 'Purchased'),
(53, 'West21', 1, 'Purchased'),
(54, 'West21', 5, 'Purchased'),
(55, 'West21', 5, 'Purchased'),
(56, 'West21', 5, 'Pending'),
(57, 'Test1', 7, 'Pending'),
(58, 'Test1', 6, 'Pending'),
(59, 'Test1', 5, 'Pending'),
(60, 'Test1', 2, 'Pending'),
(61, 'Test1', 2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Nama` varchar(255) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Nama`, `User_ID`, `Password`, `Level`) VALUES
('12345', '12345', '12345', 'Admin'),
('awawdawdawtqt', 'aaaa', 'aaaaaa', 'User'),
('ADMIN', 'admin', 'admin', 'Admin'),
('awadw', 'adwad', 'segsg', 'Admin'),
('twy4ew4y', 'afawf', 'qrqwtrq2', 'User'),
('fwegw3g', 'afsawf', 'awfa', 'User'),
('sgse', 'afwaf', 'rhssrhs', 'User'),
('agae', 'agawg', 'aegaeg', 'User'),
('qwqwrqwr', 'awfawfafw', 'daasdad', 'User'),
('awgawg', 'awfawfahfd', 'asfafsafwsehs', 'Admin'),
('wefawfawfawf', 'awfawgaqg', 'wegwhw', 'User'),
('awfafw', 'awfgawg', 'afwfaw', 'User'),
('testaja', 'ehhehehe', 'hehee', 'User'),
('hawseeh', 'hwerehwehws', 'ehwsehwsehws', 'User'),
('afafw', 'seseh', 'sehseg', 'User'),
('teeeeeeeeeestt', 'teestes', 'aaa', 'User'),
('Test', 'Test1', 'Test2', 'User'),
('2', 'Test1wd', 'Test2 ', 'User'),
('awfawf', 'Test2', 'awfafw', 'User'),
('srhss', 'Test3', 'awgawg', 'User'),
('wehrewrhwr', 'Test5', 'agawg', 'User'),
('Westlee', 'West21', 'hehehe', 'Admin'),
('af', 'West211412', 'awf', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Con_id`);

--
-- Indexes for table `contact_reply`
--
ALTER TABLE `contact_reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_reply`
--
ALTER TABLE `contact_reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
