<?php

namespace CarBlogBundle\Command;
//namespace CarBlogBundle\Controller;
//namespace Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CarBlogBundle\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class AisiluCarCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('aisilu:car')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $news = $input->getArgument('argument');

        //if ($input->getOption('option')) {
            // ...
        //}
		
		$base = $this->getContainer()->get('doctrine')->getManager();
		$post = new Posts;
		//iconv('windows-1251', 'utf-8', $news);
		$post->setNews($news);
		$post->setDate(new \DateTime);
		$base->persist($post);
		$base->flush();
        $output->writeln('Your post added to the blog.');
    }

}
