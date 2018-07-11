<?php
namespace AppBundle\Command;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteUser extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:delete-user')
            ->setDescription('supprime les utilisateurs dont la demande de suppression date de +30 jours')
            ->setHelp('supprime les utilisateurs dont la demande de suppression date de +30 jours');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $user = $em->getRepository(User::class);
        $deleteUserAction = $user->deletedUser();
        $output->writeln([
            '============',
            $deleteUserAction.' user(s) deleted',
            '============',
        ]);
    }
}