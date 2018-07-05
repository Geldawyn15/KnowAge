<?php
namespace AppBundle\Command;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;



class DeleteUser extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:delete-user')

            // the short description shown while running "php bin/console list"
            ->setDescription('supprime les utilisateurs dont la demande de suppression date de +30 jours')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('supprime les utilisateurs dont la demande de suppression date de +30 jours')

        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //grace à extends ContainerAwareCommand nous pouvons récuppérer le service doctrine
        $em = $this->getContainer()->get('doctrine')->getManager();
        //on va chercher la table user
        $user = $em->getRepository(User::class);
        // on éxécute les query du repo user
        $countUserDeleted = $user->countDeletedUser();
        $deleteUserAction = $user->deletedUser();


        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            '============',
            $countUserDeleted.' user(s) deleted',
            '============',
        ]);
    }
}