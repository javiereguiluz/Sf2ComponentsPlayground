<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
  public function configure()
  {
    $this->setName('hello');
    $this->setDefinition(array(
      new InputArgument('name', InputArgument::REQUIRED, 'Name'),
    ));
    $this->setDescription('Say hello to a person');
  }

  public function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument('name');
    $output->writeln(sprintf('Hello <info>%s</info>', $name));
  }
}
